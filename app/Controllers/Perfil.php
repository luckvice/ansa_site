<?php

namespace App\Controllers;

use CodeIgniter\Controller;
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
    public function index()
    {
        if (!session()->has('logado')) {
            return redirect()->to(base_url('/'));
        }
        helper('form');
        $data['title']              = 'Meu Perfil';
        $data['tabPerfil']          = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if (session()->has('erro')) { //se na sessao tem a variavel erro.
            $data['erro'] = session('erro');
        }
        echo view('site/paginas/perfil_content/perfil_usuario', $data);
    }

    public function cadastrarPet() //Lista Informações de de pets cadastrados
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

    public function addPet()
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

    public function removerPet()
    {
    }

    public function marcarAdotado()
    {
    }
    public function listarPets() //Lista Informações de de pets cadastrados
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

    public function criarDepoimento()
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
