<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Perfil extends Controller
{
	public function index()
	{
        helper('form');
        $data['title'] = 'Página Inicial';
        $data['teste'] = 'teste';
        $data['bodyPageProfile'] = True;
        $data['menuTransparent'] = False;
        if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro_perfilCadPet'] = session('erro');
		}
        echo view('site/paginas/perfil', $data);

	}
    public function meuPerfil()//Lista Informações de Perfil
	{

    }

    public function minhaOng()
	{

    }
	//--------------------------------------------------------------------

}
