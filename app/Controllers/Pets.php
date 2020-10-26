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
		if($this->request->getMethod() !== 'post'){//Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        }else{
			$validacao = $this->validate([//Validação Server Side Form
				'especie'   => 'required',//Obriga o preeenchimento do Form
			]);
			if(!$validacao){
				return redirect()->to('/perfil/cadastrarpet')->withInput()->with('erro', $this->validator);
            }else{
				echo '<pre>';
				print_r($this->request->getPostGet());
				$post = $this->request->getPostGet();
				echo $post['docil'];
                //return redirect()->route('perfil');//Redireciona para rota perfil
            } 
		}
	}
	
	public function removerPet()
	{
       
	}
}
