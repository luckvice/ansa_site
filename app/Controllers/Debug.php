<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelTest; //Carrega Model SQL
use App\Models\Usuarios; //Carrega Model SQL
use App\Models\Cidades; //Carrega Model SQL
use App\Models\Estados; //Carrega Model SQL
use App\Models\Pets; //Carrega Model SQL

class Debug extends Controller
{


    public function setAdotado(){
        $pets = new Pets;
        $dados = $pets->setAdotado(9);
        
    }
    public function listarPetByid(){
        $pets = new Pets;
        $dados = $pets->getPetsByUsuario(2);

        echo '<pre>';
        var_dump($dados);
    }
    public function getEstadoByIp(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/170.239.232.46/json"));
       // echo $details->region . ' | ' . $details->city;
       $estados = new Estados;
       $resultados = $estados->getEstadosByNome($details->region);
       echo '<pre>';
       print_r($resultados);
    }

    public function listarPets(){
        $pets = new Pets(); 
        $resultados = $pets->getPets();
        echo '<pre>';
        print_r($resultados);
    }
    public function listarEstados()
    {
        $estados = new Estados;
        $resultados = $estados->getEstados();
        echo '<pre>';
        print_r($resultados);
    }

    public function listarEstadoByid(){
        $estados = new Estados;
        $resultados = $estados->getEstadosById(1);
        echo '<pre>';
        print_r($resultados);
    }

    public function listarCidadesByEstadoId(){
        $cidades = new Cidades;
        $resultados = $cidades->getCidadesByEstadoId(24);
        echo '<pre>';
        print_r($resultados);
    }

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
