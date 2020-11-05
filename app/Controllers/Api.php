<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Usuarios; //Carrega Model SQL

class Api extends ResourceController
{

    public function index(){
        $model = new Usuarios();
        $data['dados'] = $model->getUsuarioById(1);
        return $this->respond($data);
      }
}