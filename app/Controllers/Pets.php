<?php namespace App\Controllers;

class Pets extends BaseController
{
	public function index()
	{
	/*	$model = new UsuariosModel();
		$data = [
			'DEBUG' => $model->getUsuarios()
		];*/
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		echo view('site/paginas/pets', $data);

	}
    public function listar()
	{
        echo 'lista pets';
    }
	//--------------------------------------------------------------------

}
