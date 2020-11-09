<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Usuarios; //Carrega Model SQL
use App\Libraries\Sima; 

class Auth extends Controller
{

    public function login() //Realizar Login do usuario
    {
        if ($this->request->getMethod() !== 'post') { //Valida se página veio de um POST | Proteção contra direct Access
            return redirect()->to('/');
        } else {

            $validacao = $this->validate([ //Validação Server Side Form
                'email'   => 'required|valid_email', //Obriga o preeenchimento do Form
                'senha'   => 'required',
            ], [
                'email' => [ //Exemplo de msg Custom
                    'required' => 'Campo E-Mail É Obrigatório',
                ]
            ]);

            if (!$validacao) {
                //Cria uma Sessao chamada 'erro' com a mensagem de erro padrão do validator
                return redirect()->back()->withInput()->with('erro', $this->validator);
            } else {
                $dados      = $this->request->getPostGet();
                $usuarios   = new Usuarios;

                if ($usuarios->checkLogin($dados['email'], md5($dados['senha'])) == null) {
                    $error = [
                        'codigo'    => 1,
                        'mensagem'  => 'E-mail ou Senha Incorretos'
                    ];
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with('erro_login', $error);
                }
                $usuario = $usuarios->checkLogin($dados['email'], md5($dados['senha']));
                session()->set([
                    'logado'     => 1,
                    'id_usuario' => $usuario->id_usuario,
                    'id_nivel'   => $usuario->id_nivel
                ]);
                return redirect()->route('perfil'); //Redireciona para rota perfil
            }
        }
    }

    public function sair()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    public function cadastrarUsuario()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/');
        } else {

            $validacao = $this->validate([ //Validação Server Side Form
                'nome'      => 'required',
                'email'     => 'required|valid_email', //Obriga o preeenchimento do Form
                'telefone'  => 'required',
                'senha'     => 'required',
                'senha_r'   => 'required',

            ]);

            if (!$validacao) {
                //Cria uma Sessao chamada 'erro' com a mensagem de erro padrão do validator
                $error = [
                    'codigo' => 1,
                    'mensagem' =>
                    'Verifique se todos os campos estão preenchidos.'
                ];
                return redirect()->back()->withInput()->with('erro_registrar', $error);
            } else {
                $dados = $this->request->getPostGet();
                $url = "https://www.google.com/recaptcha/api/siteverify";

                $secretkey = "6LfkfN8ZAAAAAMv3y4JQLInyMBNBM8EcnYfGY322";
            
                $response = file_get_contents($url."?secret=".$secretkey."&response=".$dados['g-recaptcha-response']."&remoteip=".$_SERVER["REMOTE_ADDR"]);
            
                $data = json_decode($response);
              
            
                if (isset($data->success) && $data->success=="true") {
                    $usuarios = new Usuarios;
                    $mensagem = new Sima;

                    if (!$usuarios->checkExistsEmail($dados['email']) == null) {
                        $error = [
                            'codigo' => 1,
                            'mensagem' =>
                            'Esse E-mail já se encontra cadastrado.'
                        ];
    
                        return redirect()->back()->withInput()->with('erro_mail', $error);
                    }
    
                    if (isset($dados['ong']) == 'on') :
                        $nivel = 3;
                    else :
                        $nivel = 2;
                    endif;
    
                    $id_usuario = $usuarios->inserirUsuario(
                        $nivel,
                        $dados['nome'],
                        $dados['email'],
                        md5($dados['senha']),
                        $dados['email'],
                        $dados['telefone'],
                        date("Y-m-d H:i:s")
                    );
    
                    session()->set([
                        'logado'        => 1,
                        'id_usuario'    => $id_usuario,
                        'id_nivel'      => $nivel
                    ]);
                    $wa_message = '
-----------🐾[ANSA]🐾----------

Oiiiieee Bem vindo(a) '.$dados['nome'].'

Seu cadastro foi efetuado com sucesso! 

Agora você pode cadastrar um Pet para adoção!
Acelere o processo de adoção usando nossa plataforma.

Agradecemos seu interesse.

Att. Equipe ANSA.
';
                   $mensagem->enviarMensagemWa($dados['telefone'],$wa_message);
                   $mensagem->enviarMensagemEmail('Cadastro Efetuado com sucesso!',view('site/templates/email/sucesso_cadastro'), $dados['email']);

                   return redirect()->route('perfil'); //Redireciona para rota perfil
                }
                else{
                    $error = [
                        'codigo' => 1,
                        'mensagem' =>
                        'Por favor marque a opção não sou um robô.'
                    ];
                    return redirect()->back()->withInput()->with('erro_registrar', $error);
                }

                         
            }
        }
    }
}
