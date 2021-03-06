<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pets as Pets_model; //Carrega Model SQL | alias para não repetir o nome da Classe
use App\Models\Estados;
use App\Models\Cidades;
use App\Models\Ongs;
use App\Libraries\Waintegracao;
use App\Helpers\Geopets;

class Pets extends Controller
{
	public function index($especie = 'todos', $limit = 0, $tamanho = 'todos', $sexo = 'todos', $estado = '', $cidade = '')
	{
		$estados = new Estados();
		$cidades = new Cidades();
		$data['estados']         	= $estados->getEstados();
		$pets 	= new Pets_model;
		$loc 	= new Geopets;
		$paginacao = 4;

		$proximo 	= 	$limit + $paginacao;
		$anterior	=	$limit - $paginacao;
		
		if($anterior >=0){
			$data['anterior'] = $especie.'/'.$anterior;
		}else{
			$data['anterior'] = '';
		}

		$data['proximo'] = $especie.'/'.$proximo;

		if(session()->get('gps') == false){
			
			$regiao = $loc->getLocalizacaoUserByIp();
			$id_cidade = $regiao['id_cidade'];
			$id_estado = $regiao['id_estado'];
		
		}else{
			if(session()->get('gps') == true){
				$id_cidade = session()->get('id_cidade');
				$id_estado = session()->get('id_estado');
			}
		}

		$data['cidades'] = $cidades->getCidadesByEstadoId(session()->get('id_estado'));

		helper('form');
		//Configurações de pagina
		$data['title'] = 'Pets | Amigo Não se Abandona';
		$data['menuTransparent'] = False;

				//Verifica Mensagem de erro do Login Auth Controller
		if (session()->has('erro')) { //se na sessao tem a variavel erro.
			$data['erro'] = session('erro');
		}
		if (session()->has('erro_registrar')) { //se na sessao tem a variavel erro.
			$data['erro_registrar'] = session('erro_registrar');
		}

		if ($this->request->getMethod() == 'post') { //Valida se página veio de um POST | Proteção contra direct Access
			
			session()->set('filtrar',true);

			$estado 	= $this->request->getPostGet('estado_pet');
			$cidade 	= $this->request->getPostGet('cidade_pet');
			$tamanho 	= $this->request->getPostGet('porte');
			$sexo 		= $this->request->getPostGet('sexo');

			session()->set('filtrar_id_cidade',	$cidade);
			session()->set('filtrar_id_estado',	$estado);
			session()->set('filtrar_tamanho',	$tamanho);
			session()->set('filtrar_sexo',		$sexo);

			return redirect()->to('/pets'.'/'.session()->get('especieNome').'/'.$limit.'/'.$tamanho.'/'.$sexo.'/'.$estado.'/'.$cidade);
		}
		if(session()->has('filtrar')){
			$cidade 					= session()->get('filtrar_id_cidade');
			$estado 					= session()->get('filtrar_id_estado');
			$tamanho					= session()->get('filtrar_tamanho');
			$sexo						= session()->get('filtrar_sexo');
			$nome_cidade				= $cidades->getCidadesById($cidade);
			$nome_estado				= $estados->getEstadoById($estado);
			if(!empty($nome_cidade)){
				$nome_cidade = $nome_cidade->nome;
			}

			$data['mensagem_filtro'] 	= 'Filtrando pets na região de '.$nome_estado->nome.' / '.$nome_cidade; 
		}else{
			if(empty($cidade)): $cidade = $id_cidade; endif;
			if(empty($estado)): $estado = $id_estado; endif;
			$data['mensagem_filtro'] 	= 'Mostrando pets próximos a sua região '.session()->get('estado').' '.session()->get('cidade'); 
		}

		if($estado != 0  && $cidade == 0 || $estado != 'todos' && $cidade == 0) : 
			$filtrar_estado = true; 
			if($estado == ''): $regiao = $cidade;
			$filtrar_estado = false; 
			else:  
			$regiao = $estado; 
		endif;
		
		else: $filtrar_estado = false; $regiao = $cidade; 
		endif;
		if($sexo == 0){$filtrar_sexo = True; $sexo = 'null';}else{ $filtrar_sexo = False; }

		if($tamanho == 0 || $tamanho == 'todos'){$filtrar_tamanho = True; }else{$filtrar_tamanho = False; echo $filtrar_tamanho;}
		if($especie == 'caes'){
			$data['caes'] = true;
			session()->set('especieNome','caes');
			session()->set('especie',1);
			$data['listaPets'] = $pets->getPets($regiao, $filtrar_estado, true, false, 1, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0,$paginacao,$limit);	
			$total = $pets->getPets($regiao, $filtrar_estado, true, false, 1, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0,99999, 99999, true);	
	
		}elseif($especie == 'gatos'){
			$data['gatos'] = true;
			session()->set('especieNome','gatos');
			session()->set('especie',2);
			$data['listaPets'] = $pets->getPets($regiao, $filtrar_estado, true, false, 2, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0, $paginacao,$limit);	
			$total = $pets->getPets($regiao, $filtrar_estado, true, false, 2, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0,99999, 99999, true);	
		}
		elseif($especie == 'todos'){
			$data['todos'] = true;
			session()->set('especieNome','todos');
			session()->set('especie',0);
			$data['listaPets'] = $pets->getPets($regiao, $filtrar_estado, true, true, true, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0 , $paginacao, $limit);
		//	$total = $pets->getPets($regiao, $filtrar_estado, true, true, true, $filtrar_sexo, $sexo, $filtrar_tamanho, $tamanho,0,99999, 99999, true);	
		}else{
			session()->set('especie',0);
			$data['listaPets'] = $pets->getPets($regiao, false, true, true, true, true, null, true, null, 0 , $paginacao, $limit);
			$total = $pets->getPets($regiao, false, true, true, true, true, null, true, null, 0 ,99999, 99999, true);	
		}

	echo view('site/paginas/pets', $data);
	}

	public function redefinir()
	{
		session()->remove('filtrar');
		session()->remove('filtrar_id_cidade');
		session()->remove('filtrar_id_estado');
		session()->remove('filtrar_tamanho');
		session()->remove('filtrar_sexo');
		return redirect()->to(base_url('pets'));
	}

	public function pet($id_pet)
	{
		helper('form');
		helper('text');
		$estados 	= new Estados();
		$pet 		= new Pets_model;
		$ong 		= new Ongs;
		$data['estados']         	= $estados->getEstados();

		session()->set('criptopost',random_string('sha1',150));//Cria sessão criptografada
	//	session()->markAsFlashdata('criptopost');//marca como sessao temporaria

		//Configurações de pagina
		$data['menuTransparent'] 	= 	False;
		
		//Verifica Mensagem de erro do Login Auth Controller
		if (session()->has('erro')) { //se na sessao tem a variavel erro.
			$data['erro'] = session('erro');
		}

		if (session()->has('erro_registrar')) { //se na sessao tem a variavel erro.
			$data['erro_registrar'] = session('erro_registrar');
		}

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
		$data['genero'] 		= $pet->id_sexo == 1 ? 'o' : 'a';
		$data['adotado']		= $pet->adotado;
		$data['ong']            = $ong->getOngByIdUsuario($pet->id_usuario);

		$imagens_pet = array();

		if(!empty($petGaleria)):
			if(isset($petGaleria[0]->imagem)):
					$imagens_pet[] = $petGaleria[0]->imagem;
				endif;
			if(isset($petGaleria[1]->imagem)):
					$imagens_pet[] = $petGaleria[1]->imagem;
				endif;
				if(isset($petGaleria[2]->imagem)):
					$imagens_pet[] = $petGaleria[2]->imagem;
				endif;
		endif;

		$data['imagens_pet'] = $imagens_pet;
		$data['title'] 		 = 'Conheça '.$data['genero'].' '. $pet->nome .' | Amigo Não se Abandona';

		session()->set('email_usuario',$pet->email);
		session()->set('telefone_usuario',$pet->telefone);

		echo view('site/paginas/pet', $data);
	}
}
