<?php namespace App\Controllers;

class Pets extends BaseController
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
