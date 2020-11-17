<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel; //Carrega Model SQL
use App\Models\Estados;
use App\Models\Cidades;
use App\Helpers\Geoip;
use App\Models\Ongs;

class Home extends Controller
{
	public function index()
	{
		helper('form');
		$estados 					= new Estados();
		$ongs						= new Ongs;
		$geoip	 					= new Geoip;

		$data['estados']    		= $estados->getEstados();
		$data['title'] 				= 'Amigo Não se Abandona | Página Inicial';
		$data['menuTransparent'] 	= True;
		$data['ongs']				= $ongs->getOngsByCidade($geoip->getCidadePorIp());
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
			base_url('assets/img/gato1.jpg'),
			base_url('assets/img/gato3.jpg')			
		];
		$numRamdom 			= array_rand($imagens);
		$data['backgroud'] 	= $imagens[$numRamdom];
		echo view('site/paginas/home', $data);
	}
}
