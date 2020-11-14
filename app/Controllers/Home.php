<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel; //Carrega Model SQL

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
		$data['menuTransparent'] = True;

		//Verifica Mensagem de erro do Login Auth Controller
		if (session()->has('erro')) { //se na sessao tem a variavel erro.
			$data['erro'] = session('erro');
		}
		if (session()->has('erro_registrar')) { //se na sessao tem a variavel erro.
			$data['erro_registrar'] = session('erro_registrar');
		}
		$imagens = [
			base_url('assets/img/dog1.jpg'),
			base_url('assets/img/dog2.jpg'),
			base_url('assets/img/dog3.jpg'),
			base_url('assets/img/dog4.jpg'),
			base_url('assets/img/gato1.jpg')			
		];
			
		$numRamdom = array_rand($imagens);
		
		$data['backgroud'] = $imagens[$numRamdom];

			echo view('site/paginas/home', $data);
	}


	//--------------------------------------------------------------------

}
