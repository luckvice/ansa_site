<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pets as Pets_model; //Carrega Model SQL | alias para não repetir o nome da Classe
use App\Models\Ongs as Ongs_model;
use App\Models\Estados;
use App\Models\Usuarios;
use App\Models\Cidades;
use App\Libraries\Waintegracao;
use App\Helpers\Geoip;

class Ongs extends Controller
{
    public function ong($id_ong)
    {
        helper('form');
        $pet        = new Pets_model;
        $ong        = new Ongs_model;
        $estados    = new Estados;
        $cidade     = new Cidades;
        $data['estados'] = $estados->getEstados();
       // $data['cidades'] = $cidade->getCi;
        //Configurações de pagina
		$data['title'] 				= 	'ONG | Amigo Não se Abandona';
        $data['menuTransparent'] 	= 	False;

        //Verifica Mensagem de erro do Login Auth Controller
		if (session()->has('erro')) { //se na sessao tem a variavel erro.
			$data['erro'] = session('erro');
		}

		if (session()->has('erro_registrar')) { //se na sessao tem a variavel erro.
			$data['erro_registrar'] = session('erro_registrar');
		}

		if(empty($ong)){
			return view('errors/html/production');
        }
    
        // ONG e seus campos
        $ong            = $ong->getOngById($id_ong);
        $data['ong']    = $ong;
        $campos_contato = array();

        if($ong->site)      $campos_contato[] = 'site';
        if($ong->facebook)  $campos_contato[] = 'facebook';
        if($ong->twitter)   $campos_contato[] = 'twitter';
        if($ong->instagram) $campos_contato[] = 'instagram';

        $data['campos_contato'] = $campos_contato;
        $data['listaPets']      = $pet->getPetsByUsuario($ong->id_usuario); // Lista de Pets
        $usuario                = new Usuarios; // Cidade da ONG
        $usuario                = $usuario->getUsuarioById($ong->id_usuario);
        $data['cidade']         = $cidade->getCidadesById($usuario->id_cidade);
        echo view('site/paginas/ong', $data);
    }
}
