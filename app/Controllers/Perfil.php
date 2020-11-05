<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios; //Carrega Model SQL
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
                return redirect()->to(base_url('/perfil'))->withInput()->with('mensagem', $mensagem);
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
        helper('form');
        $data['title']           = 'Cadastrar um pet';
        $data['tabCadastrarPet'] = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile'] = True;
        $data['menuTransparent'] = False;
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
                'especie'   => 'required', //Obriga o preeenchimento do Form
            ]);
            if (!$validacao) {
                return redirect()->to('/perfil/cadastrarpet')->withInput()->with('erro', $this->validator);
            } else {
                echo '<pre>';
                print_r($this->request->getPostGet());
                $post = $this->request->getPostGet();
                echo $post['docil'];

                $base = file_get_contents($this->request->getFile('galeria'));

                $binary = base64_encode($base);

                echo "<img src='data:image/jpeg;base64,{$binary}'>";
                //return redirect()->route('perfil');//Redireciona para rota perfil
            }
        }
    }

    public function removerPet() //function
    {
    }

    public function marcarAdotado() //function
    {
    }
    public function listarPets() //View
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        helper('form');
        $data['title']              = 'Listar pets';
        $data['tabListarPets']      = 'active now';
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if (session()->has('erro')) {
            $data['erro'] = session('erro');
        }
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
