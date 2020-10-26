<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Pets extends Controller
{
	public function index()
	{
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		echo view('site/paginas/pets', $data);
	}
	public function listar($especie = 'ALL', $tamanho = 'ALL')
	{
        echo 'lista pets Tipo '.$especie.' Tamanho '.$tamanho;
	}
	
	public function cadastrarPet()
	{
		echo 'Cadastrou!';
	}
	
	public function removerPet()
	{
       
	}



	//--------------------------------------------------------------------
}
