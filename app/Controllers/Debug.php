<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelTest; //Carrega Model SQL
use App\Models\Usuarios; //Carrega Model SQL
class Debug extends Controller
{

    public function inserirUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->inserirUsuario('testando', 'outrasenha', 'outro@aa.com');
        echo '<pre>';
        print_r($resultados);
    }

    public function listarUsuarios()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->listarUsuarios();
        echo '<pre>';
        print_r($resultados);
    }
    public function checkUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->checkLogin('lucas@ansa.com.br', 'testesenha');
        echo '<pre>';
        if (!$resultados == null) {
            echo $resultados->nome;
        }

        // echo $db->error();
    }

    public function atualizarUsuario()
    {
        $usuarios = new ModelTest;
        $resultados = $usuarios->updateUsuario('testandoupdate', 'outrasenhaupdate', 'outro@aa.com', 2);
        echo '<pre>';
        print_r($resultados);
    }

    public function atualizaSenha(){
        $usuarios   = new Usuarios;
        $resultados = $usuarios->updateSenha(2, 'novasenha');
        print_r($resultados);
    }
}
