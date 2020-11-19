<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Sobre extends Controller
{
	public function index()
	{
        $data = array();
        
        $data['title'] 				= 'Sobre Nós | Amigo Não se Abandona';
        $data['menuTransparent'] 	= false;
        
		echo view('site/paginas/home_content/sobre', $data);
	}
}
