<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel; //Carrega Model SQL
use App\Models\Estados;
use App\Models\Cidades;
use App\Helpers\Geopets;
use App\Models\Ongs;
use App\Libraries\Sima;

class Contato extends Controller
{
	public function index()
	{
		helper('form');
		$estados 					= new Estados();

		$data['estados']    		= $estados->getEstados();
        
        $data['title'] 				= 'Fale Conosco | Amigo Não se Abandona';
        $data['menuTransparent'] 	= false;
        
		echo view('site/paginas/home_content/contato', $data);
	}

	public function enviar() {

		if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {
            $validacao = $this->validate([ //Validação Server Side Form
                'nome'      => 'required', 
                'email'   => 'required', 
                'telefone'     => 'required',
                'mensagem'     => 'required'
            ]);
            if (!$validacao) {

				$mensagem = [
					'success'     => false,
					'mensagem'   =>'Informe seus dados corretamente!'
				];

            	$data['validator'] = $this->validator->listErrors();
				return redirect()->to('/contato')->withInput()->with('erro', $data['validator']);
				
            } else {
                
				$dados   = $this->request->getPostGet();
				
				$sima = new Sima;
				
				$conteudo['img_header'] = base_url('assets/img/dog_perfil.jpg');     
				$conteudo['mensagem']   = $dados;
	
				$to = "amigonaoseabandona@gmail.com";
				
				$sima->enviarMensagemEmail('Contato | Amigo Não se Abandona', view('site/templates/email/contato', $conteudo), $to);
				
			   	$mensagem = [
					'success'    => true,
					'mensagem'   =>'Mensagem enviada com sucesso!'
				];

               return redirect()->to('/contato')->with('mensagem', $mensagem);//Redireciona para rota perfil
			
			}
		}
		
	}
}
