<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contato extends Controller
{
	public function index()
	{
        $data = array();
        
        $data['title'] 				= 'Fale Conosco | Amigo Não se Abandona';
        $data['menuTransparent'] 	= false;
        
		echo view('site/paginas/home_content/contato', $data);
	}
}
