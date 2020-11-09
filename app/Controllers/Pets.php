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
			$data['listaPets'] = $pets->getPets($estado_cidade, $limiteEstado, true, false, 1, $todosSexos, $sexo, $todosTamanhos, $tamanho);
		} else if (session()->get('especie') == 2) {
			$data['cats'] = true;
			$data['listaPets'] = $pets->getPets($estado_cidade, $limiteEstado, true, false, 2, $todosSexos, $sexo, $todosTamanhos, $tamanho);
		} else if (session()->get('especie') == 4) {
			$data['all'] = true;
			$data['listaPets'] = $pets->getPets($estado_cidade, $limiteEstado, true, true, null, $todosSexos, $sexo, $todosTamanhos, $tamanho);
		}
		echo view('site/paginas/pets', $data);
	}
	public function pet($id_pet)
	{
		$pet = new Pets_model;
		helper('form');
		//Configurações de pagina
		$data['title'] 				= 'Ver Pets';
		$data['menuTransparent'] 	= False;
		$pet						= $pet->getPet($id_pet);
		//Popula infos
		$data['nome'] 		= $pet->nome;
		$data['imagem']		= $pet->imagem;
		
		/*
							    <!--<p class="card-text"><i class="fas fa-paw"></i></p>-->
								<!--<p class="card-text"><i class="fas fa-exclamation-triangle"></i>Agressivo</p>-->
								<!--<p class="card-text"><i class="fas fa-couch"></i>Calmo</p>-->
								<!--<p class="card-text"><i class="fas fa-hand-peace"></i>Sociável</p>-->
								<!--<p class="card-text"><i class="fas fa-running"></i>Independente</p>-->
								<!--<p class="card-text"><i class="fas fa-heart-broken"></i>Carente</p>-->
								<!--<p class="card-text"><i class="fas fa-sad-tear"></i>Assustado</p>-->
								<!--<p class="card-text"><i class="fas fa-bone"></i>Brincalhão</p>-->
		*/
		$caracteristica = [
			'Docil' 		=> ['fas fa-paw'					,$pet->docil],
			'Sociavel'		=> ['fas fa-hand-peace'				,$pet->sociavel],
			'Brincalhao' 	=> ['fas fa-bone'					,$pet->brincalhao],
			'Agressivo' 	=> ['fas fa-exclamation-triangle'	,$pet->agressivo],
			'Indepedente' 	=> ['fas fa-running'				,$pet->independente],
			'Carente' 		=> ['fas fa-heart-broken'			,$pet->carente],
			'Calmo' 		=> ['fas fa-sad-tear'				,$pet->assustado],

		];

		$saude = [
			'Vacinado' 				=> ['fas fa-syringe'				,$pet->vacinado],
			'Vermifugado' 			=> ['fas fa-capsules'				,$pet->vermifugado],
			'Castrado' 				=> ['fas fa-briefcase-medical'		,$pet->castrado],
			'Cuidados Especiais'	=> ['fas fa-capsules'				,$pet->cuidados_especiais]
		];
		
		$data['caracteristica'] = $caracteristica;
		$data['saude'] 			= $saude;
		$data['descricao']		= $pet->descricao;
		//'fas fa-paw'

		echo view('site/paginas/pet', $data);
	}
}
