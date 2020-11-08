<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios; //Carrega Model SQL
use App\Models\Pets; //Carrega Model SQL
use App\Models\Estados; //Carrega Model SQL
use App\Models\Cidades; //Carrega Model SQL
use App\Libraries\Icons;
use App\Libraries\Galeria;

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
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        $usuario   = new Usuarios;
        $dados = $usuario->getUsuarioById(session()->get('id_usuario'));
        helper('form');
        $data['title']              = 'Meu Perfil';
        $data['tabPerfil']          = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        $data['usuario']            = $dados;

        if (session()->has('erro')) { //se na sessao tem a variavel erro.
            $data['erro'] = session('erro');
        }
        echo view('site/paginas/perfil_content/perfil_usuario', $data);
    }

    public function alterar(){
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else{
            $dados = $this->request->getPostGet();
            $usuario   = new Usuarios;
            var_dump($dados);
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
                'senha_r'   => 'required' //Obriga o preeenchimento do Form
            ]);
            if (!$validacao) {
                $mensagem = ['codigo' => 2, 'mensagem' => 'Verifique se os campos estão completos'];
                return redirect()->to(base_url('perfil'))->withInput()->with('mensagem', $mensagem);
            } else {
                $dados      = $this->request->getPostGet();
                $usuario    = new Usuarios;
                if($dados['senha'] == $dados['senha_r']){
                    $usuario->updateSenha(session()->get('id_usuario'), md5($dados['senha']));
                    $mensagem = ['codigo' => 1, 'mensagem' => 'Senha alterada com sucesso'];
                    return redirect()->to(base_url('perfil'))->with('mensagem', $mensagem);
                }
                $mensagem = ['codigo' => 2, 'mensagem' => 'As senhas não são iguais'];
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
        $data['title']           = 'Cadastrar um pet';
        $data['tabCadastrarPet'] = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile'] = True;
        $data['menuTransparent'] = False;
        $data['estados']         = $estados->getEstadoById(21);
        $data['cidades']         = $cidades->getCidadesByEstadoId(21);   

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
                'idade'     => 'required', 
                'descricao' => 'required', 
                'imagem1'   => 'uploaded[imagem1]|is_image[imagem1]|max_size[imagem1, 8048]|ext_in[imagem1,jpg,png]',
                'imagem2'   => 'is_image[imagem2]|max_size[imagem2, 2048]|ext_in[imagem2,jpg,png]',
                'imagem3'   => 'is_image[imagem3]|max_size[imagem3, 2048]|ext_in[imagem3,jpg,png]',
            ]);
            if (!$validacao) {
            $data['validator'] = $this->validator;
            
            return redirect()->to('/perfil/cadastrarpet')->withInput()->with('erro', $data['validator']->listErrors());
            } else {
                
               $pet = new Pets();
               $id_usuario = session()->get('id_usuario');
             
               $dados = $this->request->getPostGet();

               
               $imagem1 = base64_encode(file_get_contents($this->request->getFile('imagem1')));//Primeira imagem é obrigatoria
               $imagem2 = $this->request->getFile('imagem2');
               $imagem3 = $this->request->getFile('imagem3');
               $imagem4 = $this->request->getFile('imagem4');
               //Outras imagens não são obrigatorias
               if(empty($imagem2->getName())): $imagem2 = null;
                else: $imagem2 = base64_encode((file_get_contents($imagem2))); endif;
               if(empty($imagem3->getName())): $imagem3 = null;
                else: $imagem3 = base64_encode((file_get_contents($imagem3))); endif; 
                if(empty($imagem4->getName())): $imagem4 = null;
                else: $imagem4 = base64_encode((file_get_contents($imagem4))); endif; 
               $galeria = [
                   'imagem1' => $imagem1,
                   'imagem2' => $imagem2,
                   'imagem3' => $imagem3,
                   'imagem4' => $imagem4,
               ];

          //    $teste =  $this->request->getFile('imagem1');
            //   echo $teste->guessExtension('imagem1');
               $pet->insertPet($dados, $galeria, $id_usuario, date("Y-m-d H:i:s"));

               $mensagem = ['codigo' => 1,'mensagem'=>'Sucesso!'];
                return redirect()->to(base_url('perfil/listarpets'))->with('mensagem', $mensagem);//Redireciona para rota perfil


            }
        }
    }

    public function removerPet() //function
    {
    }

    public function marcarAdotado() //function
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {
            $id_pet = $this->request->getPostGet('id_pet');

            $pets = new Pets;
            $dados = $pets->setAdotado($id_pet, session()->get('id_usuario'));

            if($dados == 1){
                $mensagem = ['codigo' => 1, 'mensagem'=>'Pet Marcado como adotado com sucesso.'];
                return redirect()->to(base_url('/perfil/cadastrarpet')->with('mensagem', $mensagem));
            }
        }
    }

    public function getCapa($id_pet){
        $teste = 'testando';
        return $teste;
    }
    public function listarPets() //View
    {
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
        $icons = new Icons();
     
       // echo $icons->teste();
      echo view('site/paginas/perfil_content/perfil_listarPets', $data);
    }

    public function criarDepoimento() //View
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        helper('form');
        $data['title']              = 'Criar depoimento';
        $data['tabCriarDepoimento'] = 'active now';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
        echo view('site/paginas/perfil_content/perfil_criarDepoimento', $data);
    }
}
