<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pets as Pets_model; //Carrega Model SQL | alias para não repetir o nome da Classe
use App\Models\Ongs as Ongs_model;
use App\Models\Estados;
use App\Models\Cidades;
use App\Libraries\Waintegracao;
use App\Helpers\Geoip;

class Ongs extends Controller
{
    public function index()
    {
        
    }

    public function ong($id_ong)
    {
        
        $ong = new Ongs_model;

        //Configurações de pagina
		$data['title'] 				= 	'Ver Pets';
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
        
        $ong = $ong->getOngById($id_ong);

        $data['ong'] = $ong;
        
        echo view('site/paginas/ong', $data);
    }
}
