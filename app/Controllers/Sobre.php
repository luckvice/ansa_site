<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel; //Carrega Model SQL
use App\Models\Estados;
use App\Models\Cidades;
use App\Helpers\Geopets;
use App\Models\Ongs;

class Sobre extends Controller
{
	public function index()
	{
		
		helper('form');

		$estados 		 = new Estados();
		$data['estados'] = $estados->getEstados();
        
        $data['title'] 				= 'Sobre Nós | Amigo Não se Abandona';
        $data['menuTransparent'] 	= false;
        
		echo view('site/paginas/home_content/sobre', $data);
	}
}
