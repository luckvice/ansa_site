<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Ongs;
use App\Models\ModelTest; //Carrega Model SQL
use App\Models\Usuarios; //Carrega Model SQL
use App\Models\Cidades; //Carrega Model SQL
use App\Models\Estados; //Carrega Model SQL
use App\Models\Pets; //Carrega Model SQL
use App\Models\Recomendacao;
use App\Libraries\Sima;
use App\Helpers\Geopets;

class Debug extends Controller
{

    public function removerrecomendacaotest(){
        $recomenda = new Recomendacao;
    
    
        $recomenda->removerRecomendacao(2);
    
        }
    public function recomendacaotest(){
    $recomenda = new Recomendacao;


   echo $recomenda->inserirRecomedacao(1,1,1,1,51999930495,'teste@teste.com');

    }

    public function titletest(){
        $title     = "What's wrong with CSS?";
      echo  $url_title = url_title($title, '_');
      echo str_replace("_", " ",$url_title);
    
   //   echo  mb_url_title($url_title, ' ');
    }
    public function geoip(){
        $geo = new Geopets;
        $data       = $geo->getLocalizacaoUser('-30.0691857', '-51.169006499999995');
        echo '<pre>';
        var_dump($data);

    }

    public function debugview(){
        return View('site/geolocate');
    }
    public function getOng(){
        $ongs = new Ongs;

       $listOngs = $ongs->getOngsByCidade('porto alegre');

        print_r($listOngs);
    }

    public function adotados(){
        $adotados = new pets;
        var_dump($adotados->getDivulgadosByIdUsuario(11));
    }
    
    public function getAdotado(){
        $pet = new Pets;
        var_dump($pet->getAdotado(67));
    }
    public function  enviarMensagemEmail(){
        $mensagem = new Sima;
      
        return $mensagem->enviarMensagemEmail('Teste','FOii','lucasmarcelo93@gmail.com');
    }
    
    public function adotar(){
        $mensagem = new Sima;

        $texto = 'Ola';
        
        return $mensagem->enviarMensagemWa('51999930495', '$texto');
    }

    public function enviarContato(){
        $mensagem = new Sima;
        return $mensagem->enviarContato('51999930495', 'Alguma coisa');
    }

    public function listaPetsAjax(){
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $pets = new Pets;
        helper('form');
        $data['title']              = 'Listar pets';
        $data['tabListarPets']      = 'active now';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        $data['listaPets']          = $pets->getPetsByUsuario(session()->get('id_usuario'));     
      
        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
     
     
       // echo $icons->teste();
      echo view('site/paginas_ajax/teste', $data);
    }

    public function cadastrarPetAjax(){
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $estados = new Estados();
        $cidades = new Cidades();
        helper('form');
        $data['estados']         = $estados->getEstadoById(21);
        $data['cidades']         = $cidades->getCidadesByEstadoId(21);   

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
        echo view('site/paginas_ajax/teste2', $data);
    }

    public function setAdotado(){
        $pets = new Pets;
        $dados = $pets->setAdotado(9);

    }
    public function listarPetByidUsuario(){
        $pets = new Pets;
        $dados = $pets->getPetsByUsuario(2);

        echo '<pre>';
        var_dump($dados);
    }

    public function listarPetByid($id_pet){
        $pets = new Pets;
        $dados = $pets->getPet($id_pet);

        echo '<pre>';
        var_dump($dados);
    }

    public function getEstadoByIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/170.239.232.46/json"));
       // echo $details->region . ' | ' . $details->city;
       $estados = new Estados;
       $resultados = $estados->getEstadosByNome($details->region);
       echo '<pre>';
       print_r($resultados);
    }

    public function listarPets(){
        $pets = new Pets(); 
        $resultados = $pets->getPets('rio grande do sul', 0, true, true);
        echo '<pre>';
        var_dump($resultados);
    }
    public function getPetsRecords(){
        $pets = new Pets;
        var_dump($pets->getNumPets(1,1));
    }
    public function listarEstados()
    {
        $estados = new Estados;
        $resultados = $estados->getEstados();
        echo '<pre>';
        print_r($resultados);
    }

    public function listarEstadoByid(){
        $estados = new Estados;
        $resultados = $estados->getEstadosById(1);
        echo '<pre>';
        print_r($resultados);
    }

    public function listarCidadesByEstadoId(){
        $cidades = new Cidades;
        $resultados = $cidades->getCidadesByEstadoId(24);
        echo '<pre>';
        print_r($resultados);
    }

    public function inserirUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->inserirUsuario('testando', 'outrasenha', 'outro@aa.com');
        echo '<pre>';
        print_r($resultados);
    }

    public function listarUsuarios()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->listarUsuarios();
        echo '<pre>';
        print_r($resultados);
    }

    public function listarOng($par, $par1)
    {
        $ongs = new Ongs;
        $resultados = $ongs->getOngsByIdUsuario(3);
        echo '<pre>';
        print_r($resultados);
    }

    public function checkUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->checkLogin('lucas@ansa.com.br', 'testesenha');
        echo '<pre>';
        if (!$resultados == null) {
            echo $resultados->nome;
        }

        // echo $db->error();
    }

    public function atualizarUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->updateUsuario('testandoupdate', 'outrasenhaupdate', 'outro@aa.com', 2);
        echo '<pre>';
        print_r($resultados);
    }

    public function atualizaSenha(){
        $usuarios   = new Usuarios;
        $resultados = $usuarios->updateSenha(2, 'novasenha');
        print_r($resultados);
    }

    public function templateEmail($template) {

        // Todos
        $data['usuario'] = 'Felipe Pereira';
        $data['link_acesso'] = 'https://amigonaoseabandona.com.br';
        $data['img_header'] = 'http://localhost:8080/assets/img/dog_perfil.jpg';

        // Solicitação de adoção
        $data['genero'] = 'o'; // o: se for macho / a: se for fêmea
        $data['nome_pet'] = 'Bethoven';
        $data['novasenha'] = '126515615';
        $data['imagem_pet'] = 'https://static1.patasdacasa.com.br/articles/7/44/7/@/1498-algumas-racas-de-cachorro-sao-mais-indep-articles_media_mobile-1.jpg';

        $data['nome_interessado'] = 'Jady Maia';
        $data['telefone_interessado'] = '(51) 99999-8888';
        $data['email_interessado'] = 'jady@hotmail.com';
        $data['mensagem_interessado'] = 'Olá, gostaria de saber como posso pegar o cachorrinho! Você poderia me dizer onde posso encontrá-lo? Fico no aguardo!';
        
        // Sugestão de adoção
        $data['id_pet'] = 3;

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        // echo $icons->teste();
        echo view('site/templates/email/'.$template.'.php',$data);

    }

    function getCidade($id_cidade) {

        $cidade = new Cidades;

        $cidade = $cidade->getCidadesById($id_cidade);

        var_dump($cidade);

    }

    function recomendar() {

        $recomendacao = new Recomendacao;
        $pets = new Pets;
        $mensagem = new Sima;

        $desejos = $recomendacao->listarRecomendacoes();

        $consultas_realizadas = array();
        $recomendacoes_para_excluir = array();

        foreach ($desejos as $key => $desejo) {
            
            $caracteristicas_hash = md5($desejo->id_cidade . $desejo->id_porte . $desejo->id_sexo . $desejo->id_especie);

            if (!array_key_exists($caracteristicas_hash, $consultas_realizadas)) :
                $consulta = $pets->getPetsByRecomendacao($desejo);
                $consultas_realizadas[$caracteristicas_hash] = $consulta;
            else :
                $consulta = $consultas_realizadas[$caracteristicas_hash];
            endif;

            // Caso haja PETs correspondentes ao interesse do solicitante:
            if(count($consulta) > 0) {
                
                //Montamos o link de acesso para a consulta dos pets
                $data['link'] = base_url('/') . '/pets/todos/0/' . $desejo->id_porte . '/' . $desejo->id_sexo . '/0/' . $desejo->id_cidade;
                
                // Montamos o texto que será enviado para o WhatsApp do interessado
                $texto = "Oie! 😊💜
                
🙋‍♂️ Venho aqui para te informar que um novo amiguinho que você procurava chegou no Amigo Não se Abandona! 🐶😸
                
◾ Estamos enviando essa recomendação de acordo com todas as características as quais você estava procurando! 😻
                
◾ Acesse o link e adote seu novo amigo! 💜 " . $data['link'];
                
                if($desejo->telefone)
                    $mensagem->enviarMensagemWa($desejo->telefone, $texto);
                
                $data['img_header'] = base_url('assets/img/dog_perfil.jpg');
                
                if($desejo->email)
                    $mensagem->enviarMensagemEmail('Sugestão de Adoção | Amigo Não se Abandona', view('site/templates/email/sugestao_adocao',$data), $desejo->email);

                // Como a recomendação foi enviada, adicionamos a lista de exclusão
                $recomendacoes_para_excluir[] = $desejo->id_disparo_recomendacao;
                
            }

        }

        // Excluímos as recomendações enviadas
        $recomendacao->limpar($recomendacoes_para_excluir);

    }
}
