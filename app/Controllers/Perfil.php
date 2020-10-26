<?php namespace App\Controllers;
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
        helper('form');
        $data['title']              = 'Página Inicial';
        $data['tabPerfil']          = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro_perfilCadPet'] = session('erro');
		}
        echo view('site/paginas/perfil_content/perfil_usuario', $data);

    }
    
    
    public function cadastrarPet()//Lista Informações de de pets cadastrados
	{
        helper('form');
        $data['title']           = 'Cadastrar um pet';
        $data['tabCadastrarPet'] = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile'] = True;
        $data['menuTransparent'] = False;
        if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro_perfilCadPet'] = session('erro');
		}
        echo view('site/paginas/perfil_content/perfil_cadastrarPet', $data);
    }

    public function listarPets()//Lista Informações de de pets cadastrados
	{
        helper('form');
        $data['title']              = 'Listar pets';
        $data['tabListarPets']      = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro_perfilCadPet'] = session('erro');
		}
        echo view('site/paginas/perfil_content/perfil_listarPets', $data);
    }

    public function criarDepoimento()//Lista Informações de de pets cadastrados
	{
        helper('form');
        $data['title']              = 'Criar depoimento';
        $data['tabCriarDepoimento'] = 'active now'; //Fica selecionado a Tab
        $data['bodyPageProfile']    = True;
        $data['menuTransparent']    = False;
        if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro_perfilCadPet'] = session('erro');
		}
        echo view('site/paginas/perfil_content/perfil_criarDepoimento', $data);
    }
}
