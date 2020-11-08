<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pets as Pets_model; //Carrega Model SQL | alias para não repetir o nome da Classe

class Pets extends Controller
{
	public function index($especie = '', $tamanho = '', $sexo = '')
	{


		$ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/187.113.226.25/json"));
		//echo $details->region . ' | ' . $details->city;
		
		$pets = new Pets_model;
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
	
		/* Filtros consulta */
		if ($especie == 'caes') {
			session()->set('especie', 1);
			$data['dogs'] = true;
		
			$data['listaPets'] = $pets->getPets($details->city, false, false, false, 1, true, null, true, null);
		} else if ($especie == 'gatos') {
			session()->set('especie', 2);
			$data['cats'] = true;
			$data['listaPets'] = $pets->getPets($details->city, false, false, false, 2, true, null, true, null);
		} else if ($especie == 'todos') {
			session()->set('especie', 4);
			$data['all'] = true;
			$data['listaPets'] = $pets->getPets($details->city, false, false, true, null, true, null, true, null);

		}else{
			$data['listaPets'] = $pets->getPets($details->city, false, false, true, null, true, null, true, null);

		}


		echo view('site/paginas/pets', $data);
	}

	public function buscar($especie = '')
	{
		$estado 	= $this->request->getPostGet('estado_pet');
		$cidade 	= $this->request->getPostGet('cidade_pet');
		$tamanho 	= $this->request->getPostGet('porte');
		$sexo 		= $this->request->getPostGet('sexo');

		if($cidade == 0) : $limiteEstado = true; 
			$estado_cidade = $estado;
		else:
			$estado_cidade = $cidade;
			$limiteEstado = false;
		endif;

		if($tamanho == 0):
			$todosTamanhos = true;
			$tamanho = null;
		else: 
			$todosTamanhos = false;
		endif;
		if($sexo == 0):
			$todosSexos = true;
			$sexo = null;
		else:
			$todosSexos = false;
		endif;
		

		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		$pets = new Pets_model;

		/* Filtros consulta */
		if (session()->get('especie') == 1) {
			
			$data['dogs'] = true;
		
			$data['listaPets'] = '';
		} else if (session()->get('especie') == 2) {
			
			$data['cats'] = true;
			$data['listaPets'] = '';
		} else if (session()->get('especie') == 4) {
			$data['all'] = true;
			$data['listaPets'] = $pets->getPets($estado_cidade, $limiteEstado, true, true, null, $todosSexos, $sexo, $todosTamanhos, $tamanho);
		}
		//$estado_cidade, $limiteEstado = true, $filtros = false ,$todasEspecies = true, $especie = null, $todosSexos = true, $sexo = null, $todosTamanhos = true, $tamanho = null, $adotado = 0		
		echo view('site/paginas/pets', $data);
	}
	public function pet()
	{
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		echo view('site/paginas/pet', $data);
	}
}
