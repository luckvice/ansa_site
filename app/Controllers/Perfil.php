<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios; //Carrega Model SQL
use App\Models\Pets; //Carrega Model SQL
use App\Models\Estados; //Carrega Model SQL
use App\Models\Cidades; //Carrega Model SQL
use App\Models\Ongs; //Carrega Model SQL
use App\Libraries\Sima; //Carrega Model SQL
/*

    [CONFIGURAÇÕES]
        Caso criar novas nav-tabs Criar $data['nomeTab'] = 'active now'; Para ficar marcada no menu
        tabPerfil
        tabCadastrarPet
        tabListarPets
        tabCriarDepoimento
    
*/

class Perfil extends Controller
{
    public function index() //View
    {
        helper('form');
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }

        $usuario    = new Usuarios;
        $adotados   = new Pets;
        $cidade     = new Cidades;
        $estados    = new Estados;
        $id_usuario = session()->get('id_usuario');
        $dados      = $usuario->getUsuarioById($id_usuario);

        $data['title']              = 'Meu Perfil | Amigo Não se Abandona';
        $data['tabPerfil']          = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        $data['usuario']            = $dados;
        $data['pets_divulgados']    = $adotados->getDivulgadosByIdUsuario($id_usuario);
        $data['pets_adotados']      = $adotados->getAdotadosByIdUsuario($id_usuario); 
        $data['estados']            = $estados->getEstados();
        $data['cidade']             = $cidade->getCidadesById($dados->id_cidade);
        $data['id_cidade']          = $dados->id_cidade;
        $data['avatar_src']         = !$dados->avatar ? base_url('assets/img/404.jpg') : 'data:image/jpeg;base64,' . $dados->avatar;

        if (session()->has('erro')) { //se na sessao tem a variavel erro.
            $data['erro'] = session('erro');
        }
        echo view('site/paginas/perfil_content/perfil_usuario', $data);
    }

    public function alterar() {
        $usuario    = new Usuarios;
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else{
            $validacao = $this->validate([ //Validação Server Side Form
                'nome'      => 'required|min_length[2]|max_length[15]',
                'email'     => 'required|valid_email', //Obriga o preeenchimento do Form
                'telefone'  => 'required|max_length[15]',
                'avatar'    => 'is_image[avatar]|max_size[avatar, 8048]|ext_in[avatar,jpg,jpeg,png]'
            ]);
           
            if (!$validacao) {
               $mensagem = [
                   'codigo'     => 2, 
                   'mensagem'   => $this->validator->listErrors()
                ];
               return redirect()->back()->with('mensagem', $mensagem);
            }else{
                
            $dados      = $this->request->getPostGet();
            $id_usuario = session()->get('id_usuario');
            $email      = $usuario->checkExistsEmail($dados['email']);
            
            $upload = $this->request->getFile('avatar');
            
            if(!$upload->getSize() == 0){
                $avatar             = base64_encode(file_get_contents($upload));
                $dados['avatar']    = $avatar;
            }else{
                $dados['avatar']    = null;
            } 

            if($usuario->checkExistsEmail($dados['email']) == null){
                $resultado = $usuario->updateUsuario($id_usuario,  $dados);
                  if($resultado == 1){
                        $mensagem = [
                            'codigo'    => 1, 
                            'mensagem'  => 'Dados alterados com sucesso'
                        ];
                        return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
                    }
            }else if($email->id_usuario == $id_usuario){
                $resultado = $usuario->updateUsuario($id_usuario,  $dados);
                if($resultado == 1){
                      $mensagem = [
                          'codigo'      => 1, 
                          'mensagem'    => 'Dados alterados com sucesso'
                        ];
                      return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
                  }
                 }else{
                        $mensagem = [
                            'codigo'    => 2, 
                            'mensagem'  => 'Esse E-mail pertence a outra conta.'];
                        return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
                 }
            }
        }
    }

    public function alterarSenha(){
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else{
            $validacao = $this->validate([ //Validação Server Side Form
                'senha'     => 'required',
                'senha_r'   => 'required|matches[senha]' //Obriga o preeenchimento do Form
            ]);
            if (!$validacao) {
                $mensagem = [
                    'codigo'    => 2, 
                    'mensagem'  => 'Verifique se os campos estão completos'
                ];
                return redirect()->to(base_url('perfil'))->withInput()->with('mensagem', $mensagem);
            } else {
                $dados      = $this->request->getPostGet();
                $usuario    = new Usuarios;

                if($dados['senha'] == $dados['senha_r']){
                    $usuario->updateSenha(session()->get('id_usuario'), md5($dados['senha']));
                    $mensagem = [
                        'codigo'    => 1, 
                        'mensagem'  => 'Senha alterada com sucesso'
                    ];
                    return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
                }
                    $mensagem = [
                        'codigo'    => 2, 
                        'mensagem'  => 'As senhas não são iguais'
                    ];
                return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
            }
        }
    }

    public function cadastrarPet() //View
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $estados = new Estados();
        $cidades = new Cidades();
        helper('form');
        $data['title']           = 'Cadastrar Pet | Amigo Não se Abandona';
        $data['tabCadastrarPet'] = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile'] = True;
        $data['menuTransparent'] = False;
        $data['estados']         = $estados->getEstados();   

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
        echo view('site/paginas/perfil_content/perfil_cadastrarPet', $data);
    }

    public function addPet() //function
    {
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {
            $validacao = $this->validate([ //Validação Server Side Form
                'nome'      => 'required', 
                'especie'   => 'required', 
                'porte'     => 'required', 
                'sexo'      => 'required', 
                'estado'    => 'required',
                'cidade'    => 'required',
                'sexo'      => 'required',
                'idade'     => 'required', 
                'descricao' => 'required', 
                'imagem1'   => 'uploaded[imagem1]|is_image[imagem1]|max_size[imagem1, 8048]|ext_in[imagem1,jpg,jpeg,png]',
                'imagem2'   => 'is_image[imagem2]|max_size[imagem2, 5048]|ext_in[imagem2,jpg,jpeg,png]',
                'imagem3'   => 'is_image[imagem3]|max_size[imagem3, 5048]|ext_in[imagem3,jpg,jpeg,png]',
            ]);
            if (!$validacao) {
            $data['validator'] = $this->validator->listErrors();
            return redirect()->to('/perfil/cadastrarpet')->withInput()->with('erro', $data['validator']);
            } else {
                
               $pet = new Pets();
               $id_usuario  = session()->get('id_usuario');
               $dados       = $this->request->getPostGet();
               $imagem1     = base64_encode(file_get_contents($this->request->getFile('imagem1')));//Primeira imagem é obrigatoria
               $imagem2     = $this->request->getFile('imagem2');
               $imagem3     = $this->request->getFile('imagem3');
               $imagem4     = $this->request->getFile('imagem4');
               //Outras imagens não são obrigatorias
               if(empty($imagem2->getName())): $imagem2 = null; else: $imagem2 = base64_encode((file_get_contents($imagem2))); endif;
               if(empty($imagem3->getName())): $imagem3 = null;
                else: $imagem3 = base64_encode((file_get_contents($imagem3))); endif; if(empty($imagem4->getName())): $imagem4 = null;
                else: $imagem4 = base64_encode((file_get_contents($imagem4))); endif; 
                    $galeria = [
                        'imagem1' => $imagem1,
                        'imagem2' => $imagem2,
                        'imagem3' => $imagem3,
                        'imagem4' => $imagem4,
                    ];
               $pet->insertPet($dados, $galeria, $id_usuario, date("Y-m-d H:i:s"));
               $mensagem = [
                   'codigo'     => 1,
                   'mensagem'   =>'Sucesso!'];
               return redirect()->to(base_url('perfil/listarpets'))->with('mensagem', $mensagem);//Redireciona para rota perfil
            }
        }
    }

    public function removerPet($id_pet) //function
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $pets   = new Pets;
        $dados  = $pets->setExcluido($id_pet, session()->get('id_usuario'),1);

        if($dados == 1){
            $mensagem = [
                'codigo' => 1, 
                'mensagem'=>'Pet Excluido com sucesso'
            ];
            return redirect()->to(base_url('/perfil/listarpets'))->with('mensagem', $mensagem);
        }else{
            return redirect()->to(base_url('/perfil/listarpets'));
        }
    }

    public function marcarAdotado($id_pet) //function
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
            $pets = new Pets;
            $dados = $pets->setAdotado($id_pet, session()->get('id_usuario'),1);

            if($dados == 1){
                $mensagem = [
                    'codigo'    => 1, 
                    'mensagem'  =>'Pet Marcado como adotado com sucesso.'
                ];
                return redirect()->to(base_url('/perfil/listarpets'))->with('mensagem', $mensagem);
            }else{
                return redirect()->to(base_url('/perfil/listarpets'));
            }
    }
    public function desmarcarAdotado($id_pet) //function
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
            $pets   = new Pets;
            $dados  = $pets->setAdotado($id_pet, session()->get('id_usuario'), 0);

            if($dados == 1){
                $mensagem = [
                    'codigo'    => 1, 
                    'mensagem'  => 'Pet desmarcado como adotado com sucesso.'
                ];
                return redirect()->to(base_url('/perfil/listarpets'))->with('mensagem', $mensagem);
            }else{
                return redirect()->to(base_url('/perfil/listarpets'));
            }
    }
    public function getPaginaAjax(){
        $data['title']              = 'Ajax';
        $data['tabListarPets']      = '';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
      echo view('site/paginas/perfil_content/perfil_ajax',$data);
    }

    public function listarPets() //View
    {
        $pets = new Pets;
        helper('form');
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $data['title']              = 'Listar Pets | Amigo Não se Abandona';
        $data['tabListarPets']      = 'active now';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        $data['listaPets']          = $pets->getPetsByUsuario(session()->get('id_usuario'));     
        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
       // echo $icons->teste();
      echo view('site/paginas/perfil_content/perfil_listarPets', $data);
    }

    public function criarDepoimento() //View
    {
        $pets = new Pets;
        
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }

        helper('form');

        $data['title']              = 'Criar Depoimento | Amigo Não se Abandona';
        $data['tabCriarDepoimento'] = 'active now';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;

        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }

        echo view('site/paginas/perfil_content/perfil_criarDepoimento', $data);
    }

    public function ong() //View
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $ong    = new Ongs;
        $ong    = $ong->getOngByIdUsuario(session()->get('id_usuario'));

        // Seta o ID da ONG selecionada
        session()->set('id_ong', $ong->id_ong);

        helper('form');
        $data['title']              = 'Minha ONG | Amigo Não se Abandona';
        $data['tabOng']             = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        $data['ong']                = $ong;
        $data['avatar_src']         = !$ong->avatar ? base_url('assets/img/404.jpg') : 'data:image/jpeg;base64,' . $ong->avatar;

        if (session()->has('erro')) { //se na sessao tem a variavel erro.
            $data['erro'] = session('erro');
        }

        echo view('site/paginas/perfil_content/perfil_ong', $data);
    }

    public function editarOng(){
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {
            $validacao = $this->validate([ //Validação Server Side Form
                'nome'     => 'required', //Obriga o preeenchimento do Form
                'avatar'   => 'is_image[avatar]|max_size[avatar, 8048]|ext_in[avatar,jpg,jpeg,png]'
            ]);
            if (!$validacao) {
                $mensagem = [
                    'codigo'    => 2, 
                    'mensagem'  => 'Verifique se os campos estão completos'
                ];
                return redirect()->to(base_url('perfil/ong'))->withInput()->with('mensagem', $mensagem);
            } else {
                $dados              = $this->request->getPostGet();
                $ong                = new Ongs;
   
                $upload = $this->request->getFile('avatar');
            
                if(!$upload->getSize() == 0){
                    $avatar             = base64_encode(file_get_contents($upload));
                    $dados['avatar']    = $avatar;
                }else{
                    $dados['avatar']    = null;
                } 
    
    
                $ong->updateOng(session()->get('id_ong'), $dados);
                $mensagem = [
                    'codigo'    => 1, 
                    'mensagem'  => 'Dados alterados com sucesso!'
                ];
                return redirect()->to(base_url('perfil/ong'))->with('mensagem', $mensagem);
            }
        }
    }

    public function enviarDepoimento(){

        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }

        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {

            $validacao = $this->validate([ //Validação Server Side Form
                'nome'     => 'required', //Obriga o preeenchimento do Form
                'avatar'   => 'uploaded[avatar]|is_image[avatar]|max_size[avatar, 8048]|ext_in[avatar,jpg,jpeg,png]'
            ]);
            if (!$validacao) {
                $mensagem = [
                    'codigo'    => 2, 
                    'mensagem'  => 'Verifique se os campos estão completos'
                ];
                return redirect()->to(base_url('perfil/ong'))->withInput()->with('mensagem', $mensagem);
            } else {
                $dados              = $this->request->getPostGet();
                $ong                = new Ongs;
                $avatar             = base64_encode(file_get_contents($this->request->getFile('avatar')));
                $dados['avatar']    = $avatar;
    
                $ong->updateOng(session()->get('id_ong'), $dados);
                $mensagem = [
                    'codigo'    => 1, 
                    'mensagem'  => 'Dados alterados com sucesso!'
                ];
                return redirect()->to(base_url('perfil/ong'))->with('mensagem', $mensagem);
            }
        }
    }

}
