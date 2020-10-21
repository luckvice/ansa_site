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
