<?php namespace App\Controllers;

class Perfil extends BaseController
{
	public function index()
	{
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
