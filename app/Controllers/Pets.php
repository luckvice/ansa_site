<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Pets extends Controller
{
	public function index($estado = '', $cidade = '', $especie = '', $tamanho = '', $sexo = '')
	{
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;

		/* Filtros consulta */
		if ($especie == 'caes') {
			session()->set('especie', 1);
			$data['dogs'] = true;
		} else if ($especie == 'gatos') {
			session()->set('especie', 2);
			$data['cats'] = true;
		} else if ($especie == 'todos') {
			session()->set('especie', $especie);
			$data['all'] = true;
		}
		//Consulta no banco
		// Criar consulta aqui
		// End Consulta
		echo view('site/paginas/pets', $data);
	}

	public function pet()
	{
		helper('form');
		//Configurações de pagina
		$data['title'] = 'Ver Pets';
		$data['menuTransparent'] = False;
		echo view('site/paginas/pet', $data);
	}
}
