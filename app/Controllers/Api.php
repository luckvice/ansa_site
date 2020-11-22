<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Usuarios; //Carrega Model SQL
use App\Models\Cidades; //Carrega Model SQL
use App\Models\Pets; //Carrega Model SQL
use App\Libraries\Sima; //Carrega Model SQL
use App\Helpers\Urlencode; //Carrega Model SQL
use App\Helpers\Geopets; //Carrega Model SQL

class Api extends ResourceController
{

  
  public function getPosition(){
    $localizar  = new Geopets;
    $latitude   = $this->request->getPostGet('latitude');
    $longitude  = $this->request->getPostGet('longitude');
    $data       = $localizar->getLocalizacaoUser($latitude, $longitude);
    if(!session()->has('redireciona')){
      session()->set('redireciona', true);
      $response['codigo'] = 1;
    }else{
      $response['codigo'] = 0;
    }
    return $this->respond($response);
  }

//AIzaSyAHiOaxuvg0fgK3RZx7a8xJM7lF1VFmzsY
  public function solicitarSenha(){
    $usuario  = new Usuarios;
    $mensagem = new Sima;

    $email = $this->request->getPostGet('esqueci_email');
    if (!$usuario->checkExistsEmail($email) == null) {
      $chars      = '0123456789abcdefghijklmnopqrstuvwxyz';
      $novaSenha  = substr(str_shuffle($chars), 0, 6);
      $checkmail  = $usuario->checkExistsEmail($email);
      $usuario->updateSenha($checkmail->id_usuario, md5($novaSenha));

      $enviamensagem['img_header']  = base_url('assets/img/dog_perfil.jpg');    
      $enviamensagem['novasenha']   = $novaSenha;
      $enviamensagem['usuario']     = $checkmail->nome;

      $mensagem->enviarMensagemEmail("Solicitação de Nova Senha", view('site/templates/email/senha_alterada', $enviamensagem), $email);
      $data['status']   = 1;
      $data['mensagem'] = 'Sucesso !';
    }else{
      $data['status']   = 2;
      $data['mensagem'] = 'Este e-mail não existe';
    }
    return $this->respond($data);
  }

  public function removerPet($id_pet){
    $pet = new Pets;
    $usuario  =  session()->get('id_usuario');
    $exclusao = $pet->setExcluido($id_pet, $usuario);

    if($exclusao == 1){
      $data['exclusao'] = 1;
      $data['status']   = 1;
      $data['mensagem']   = 'Sucesso na exclusão';
    }else{
      $data['exclusao'] = 0;
      $data['status']   = 0;
      $data['mensagem']   = 'Nada aconteceu';
    }
    return $this->respond($data);
  }

  public function alterarStatusPet($id_pet){
    $pet = new Pets;
    $usuario  =  session()->get('id_usuario');
    $status = $pet->getAdotado($id_pet);
    if($status->adotado == 0){
      $pet->setAdotado($id_pet, $usuario, 1);
      $data['status']   = 1;
      $data['mensagem']   = 'Marcado como adotado';
    }elseif($status->adotado  == 1){
      $pet->setAdotado($id_pet, $usuario,0);
      $data['status']     = 0;
      $data['mensagem']   = 'Desmarcado como adotado';
    }
   return $this->respond($data);
  }

  public function solicitarAdocao(){

    $data['genero']             = $this->request->getPostGet('pet_genero');
    $data['telefone']           = $this->request->getPostGet('telefone');//Telefone do Solicitante/Interessado
    $data['telefone_usuario']   = session()->get('telefone_usuario');//Telefone do protetor
    $data['email_usuario']      = session()->get('email_usuario');
    $data['nome_protetor']      = $this->request->getPostGet('nome_protetor');
    $data['id_pet']             = $this->request->getPostGet('id_pet');
    $data['nome_pet']           = $this->request->getPostGet('nome_pet');
    $data['nome_interessado']   = $this->request->getPostGet('nome_interessado');
    $data['msg_opcional']       = $this->request->getPostGet('msg_opcional');
    $data['email_interessado']  = $this->request->getPostGet('email_interessado');
    $data['img_header']         = base_url('assets/img/dog_perfil.jpg');  

   /* $id_pet                       = $data['id_pet'];
    $telefone                     = $data['telefone'];
    $nome_pet                     = $data['nome_pet'];
    $nome_interessado             = $data['nome_interessado'];*/
    $enviamensagem['img_header']  = base_url('assets/img/dog_perfil.jpg');   

    if(empty($data['msg_opcional'])){
      $data['msg_opcional'] = 'Não deixou recado.';
    }
    if(empty($data['telefone'])){
      $datas['status']   = 2;
      $datas['mensagem'] = '* É Obrigatorio o Telefone';  
    }else if(session()->has('criptopost')){
      //$id_pet, $telefone_usuario, $nome_pet, $nome_interessado 
      $url      = $data['id_pet'].'/'.$data['telefone'].'/'.$data['nome_pet'].'/'.$data['nome_interessado'];
      $mensagem = new Sima;
      $urlEnc   = new Urlencode;
   
      $mensagem->enviarMensagemWa($data['telefone_usuario'] , 
      'Olá, '.$data['nome_protetor'].'! 🐶😸

'.$data['nome_interessado'].' está interessado em adotar o 🐾 '.$data['nome_pet'].' 🐾

📩 Mensagem: ' . $data['msg_opcional'] . '

📤 Para conversar com o interessado, clique no link abaixo:

📲 amigonaoseabandona.com.br/solicitante/'.$urlEnc->urlsafeB64Encode($url).'
      
      ');
      $mensagem->enviarMensagemEmail('Solicitação de Adoção',view('site/templates/email/solicitacao_adocao',$data),$data['email_usuario']);
      
      $datas['status']   = 1;
      $datas['mensagem'] = 'Mensagem enviada com sucesso!';

    }else{
      $datas['status']   = 4;
      $datas['mensagem'] = 'Espertinho você não ? Vá Hackear em outro lugar';
    }
    return $this->respond($datas);
  }

  public function conversarComSolicitante($url){//recebe url encrypt decrypt e retorna um metodo de conversa
    $urlDec = new Urlencode;
    $url = $urlDec->urlsafeB64Decode($url);
    $string = explode('/',$url);
     return $this->conversar($string[0],$string[1],$string[2],$string[3]);
  }


  public function conversar($id_pet, $telefone_interessado, $nome_pet, $nome_interessado){//Prepara conversa para envio via SIMA
    $mensagem = new Sima;
    $mensagem_pronta = 'Oieeee!
'.$nome_interessado.' sou o '.$nome_interessado.' protedor do pet: '.$nome_pet. '

Podemos conversar ?';
   echo 'redirecionando aguarde...';
   return $mensagem->conversarComInteressado($telefone_interessado, urlencode($mensagem_pronta));
}
  
  public function getPets(){
    $model = new Pets();
    $data  = $model->getPets(false,false);
    return $this->respond($data);
  }

  public function getGaleriaPet($id_pet){
    $model = new Pets();
    $data  = $model->getGaleriaPet($id_pet);
    return $this->respond($data);
  }

  public function getCidadesByEstadoId($id_estado){
    $model = new Cidades();
    $data  = $model->getCidadesByEstadoId($id_estado);
    return $this->respond($data);
  }

  public function disparaSugestoes(){

  }
  public function verificaTelefone($id_interessado, $token){

  }
}
