<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pets as Pets_model; //Carrega Model SQL | alias para não repetir o nome da Classe
use App\Models\Estados;
use App\Libraries\Waintegracao;
use App\Helpers\Geoip;

class Pets extends Controller
{
	public function index($especie = '', $tamanho = '', $sexo = '')
	{
		/*$ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/187.113.226.25/json"));*/
		//echo $details->region . ' | ' . $details->city;
		$estados = new Estados();
		$data['estados']         	= $estados->getEstados();
		$pets = new Pets_model;
		
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		$regiao = new Geoip;
		$regiao = $regiao->getCidadePorIp();
		/* Filtros consulta */
		if ($especie == 'caes') {
			session()->set('especie', 1);
			$data['dogs'] = true;
		
			$data['listaPets'] = $pets->getPets($regiao, false, false, false, 1, true, null, true, null);
		} else if ($especie == 'gatos') {
			session()->set('especie', 2);
			$data['cats'] = true;
			$data['listaPets'] = $pets->getPets($regiao, false, false, false, 2, true, null, true, null);
		} else if ($especie == 'todos') {
			session()->set('especie', 4);
			$data['all'] = true;
			$data['listaPets'] = $pets->getPets($regiao, false, false, true, null, true, null, true, null);
		}else{
			$data['listaPets'] = $pets->getPets($regiao, false, false, true, null, true, null, true, null);

		}

		echo view('site/paginas/pets', $data);
	}
	public function alterarPetStatus($status)
	{

	}
	public function buscar($especie = '')
	{
		$estados = new Estados();
		$data['estados']         	= $estados->getEstados();

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
		$estados = new Estados();
		$data['estados']         	= $estados->getEstados();
		$pet = new Pets_model;
		helper('form');
		helper('text');
		session()->set('criptopost',random_string('sha1',150));//Cria sessão criptografada
		session()->markAsFlashdata('criptopost');//marca como sessao temporaria

		//Configurações de pagina
		$data['title'] 				= 	'Ver Pets';
		$data['menuTransparent'] 	= 	False;
		
		if(empty($pet)){
			return view('errors/html/production');
		}
		$petGaleria					=	$pet->getGaleria($id_pet);
		$pet						= 	$pet->getPet($id_pet);
		

		if($pet->id_porte 		== 1){$data['porte'] = 'P';}
		elseif($pet->id_porte 	== 2){$data['porte'] = 'M';}
		elseif($pet->id_porte 	== 3){$data['porte'] = 'G';}
		if($pet->id_sexo 		== 1){$data['sexo']  = 'Macho'; $data['icon'] = 'fas fa-mars';}
		elseif($pet->id_sexo 	== 2){$data['sexo']  = 'Fêmea'; $data['icon'] = 'fas fa-venus';}

		$caracteristica = [
			'Dócil' 		=> ['fas fa-paw'					,$pet->docil],
			'Sociável'		=> ['fas fa-hand-peace'				,$pet->sociavel],
			'Brincalhão' 	=> ['fas fa-bone'					,$pet->brincalhao],
			'Agressivo' 	=> ['fas fa-exclamation-triangle'	,$pet->agressivo],
			'Indepedente' 	=> ['fas fa-running'				,$pet->independente],
			'Carente' 		=> ['fas fa-heart-broken'			,$pet->carente],
			'Calmo' 		=> ['fas fa-mug-hot'				,$pet->calmo],
			'Tenso'			=> ['fas fa-meh'					,$pet->tenso],
			'Assustado'		=> ['fas fa-sad-tear'				,$pet->assustado],	
			'Arisco'		=> ['fas fa-rocket'					,$pet->arisco],	
		];

		$saude = [
			'Vacinado' 				=> ['fas fa-syringe'				,$pet->vacinado],
			'Vermifugado' 			=> ['fas fa-capsules'				,$pet->vermifugado],
			'Castrado' 				=> ['fas fa-briefcase-medical'		,$pet->castrado],
			'Cuidados Especiais'	=> ['fas fa-capsules'				,$pet->cuidados_especiais]
		];
		
		//Popula infos
		$data['id_pet'] 		= $pet->id_pet;
		$data['nome'] 			= $pet->nome;
		$data['imagem']			= $pet->imagem;
		$data['faixa_etaria']	= $pet->faixa_etaria_descricao;
		$data['caracteristica'] = $caracteristica;
		$data['saude'] 			= $saude;
		$data['descricao']		= $pet->descricao;
		$data['cidade']			= $pet->municipio_nome;
		$data['uf']				= $pet->uf;
		$data['nome_protetor']	= $pet->usuario_nome;

		if(!empty($petGaleria)):
			if(isset($petGaleria[0]->imagem)):
					$data['img_opcional1'] = $petGaleria[0]->imagem;
				endif;
			if(isset($petGaleria[1]->imagem)):
					$data['img_opcional2'] = $petGaleria[1]->imagem;
				endif;
				if(isset($petGaleria[2]->imagem)):
					$data['img_opcional3'] = $petGaleria[2]->imagem;
				endif;
		endif;

		session()->set('email_usuario',$pet->email);
		session()->markAsFlashdata('email_usuario');
		session()->set('telefone_usuario',$pet->telefone);
		session()->markAsFlashdata('telefone_usuario');

		echo view('site/paginas/pet', $data);
	}
}
