<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuariosModel; //Carrega Model SQL

class Debug extends Controller
{

    public function inserirUsuarios(){
        $usuarios = new UsuariosModel;
    }

    public function listarUsuarios(){
        
    }

    public function atualizarUsuario(){

    }
}