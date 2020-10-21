<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pets extends Controller
{
	public function index()
	{
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		echo view('site/paginas/pets', $data);
	}
	public function listar($especie = 'ALL', $tamanho = 'ALL')
	{
        echo 'lista pets Tipo '.$especie.' Tamanho '.$tamanho;
    }
	//--------------------------------------------------------------------

}
