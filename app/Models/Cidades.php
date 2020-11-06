<?php

namespace App\Models;

use CodeIgniter\Model;

class Cidades extends Model
{
    public function getCidades(){
        
            $db = db_connect();
            $resultados = $db->table('municipio')->get()->getResultObject();
            $db->close();
            return $resultados;
    }

    public function getCidadesById($id_municipio){
        
        $db = db_connect();
        $resultados = $db->table('municipio')->where('id_municipio', $id_municipio)->get()->getRowObject();
        $db->close();
        return $resultados;
    }

    public function getCidadesByEstadoId($id_estado){
        
        $db = db_connect();
        $resultados = $db->table('municipio')->select('id_estado,id_municipio, nome')->where('id_estado', $id_estado)->get()->getResultObject();
        $db->close();
        return $resultados;
    }
}
