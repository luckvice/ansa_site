<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel;//Carrega Model SQL

class Home extends Controller
{
	public function index()
	{
	/*	$model = new UsuariosModel();
		$data = [
			'DEBUG' => $model->getUsuarios()
		];*/
		helper('form');
		$data['title'] = 'A.N.S.A | Página Inicial';
		$data['teste'] = 'teste';
		$data['menuTransparent'] = True;

		//Verifica Mensagem de erro do Login Auth Controller
		if(session()->has('erro')){//se na sessao tem a variavel erro.
			$data['erro'] = session('erro');
		}
		echo view('site/paginas/home', $data);

	}

	//--------------------------------------------------------------------

}
