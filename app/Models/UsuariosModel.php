<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuariosModel extends Model{
    
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuarios';
    protected $allowedFields = ['nome','senha','email','telefone','cep','avatar','id_nivel'];

    //Metodo GET Lista usuarios ou usuario
    public function getUsuarios($id = false){
        if($id === false){
            return $this->findAll();
        }else{
            return $this->asArray()->where(['id_usuarios'=> $id])->first();
        }
    }
}