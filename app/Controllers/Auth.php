<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()//Realizar Login do usuario
	{
        if($this->request->getMethod() !== 'post'){//Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        }else{
            //LOGICA DE LOGIN
            $validacao = $this->validate([//Validação Server Side Form
                'email'   => 'required|valid_email',//Obriga o preeenchimento do Form
                'senha'   => 'required',
            ],[
                'email' => [//Exemplo de msg Custom
                    'required' => 'Campo E-Mail É Obrigatório',
                ]
            ]);

            if(!$validacao){
                //Cria uma Sessao chamada 'erro' com a mensagem de erro padrão do validator
                return redirect()->back()->withInput()->with('erro', $this->validator);
            }else{
                return redirect()->route('perfil');//Redireciona para rota perfil
            } 
        }
    }

    public function cadastrar()
	{
        echo 'cadastrar';
    }
}
