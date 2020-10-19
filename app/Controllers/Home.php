<?php namespace App\Controllers;

use App\Models\UsuariosModel;//Carrega Model SQL

class Home extends BaseController
{
	public function index()
	{
	/*	$model = new UsuariosModel();
		$data = [
			'DEBUG' => $model->getUsuarios()
		];*/
		$data['title'] = 'Página Inicial';
		$data['teste'] = 'teste';
		$data['menuTransparent'] = True;
		echo view('site/paginas/home', $data);

	}

	//--------------------------------------------------------------------

}
