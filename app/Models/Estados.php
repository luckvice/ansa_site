<?php

namespace App\Models;

use CodeIgniter\Model;

class Estados extends Model
{
    public function getEstados(){
        
        $db = db_connect();
        $resultados = $db->table('estado')->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getEstadosByNome($nome){
        
        $db = db_connect();
        $resultados = $db->table('estado')->where('nome',$nome)->get()->getRowObject();
        $db->close();
        return $resultados;
    }

    public function getEstadosMununicipioByNome($nomeEstado, $nomeMunicipio){
        
        $db = db_connect();
        $resultados = $db->table('estado')
                        ->select('estado.id_estado, municipio.id_municipio')
                        ->join('municipio','municipio.id_estado = estado.id_estado')
                        ->like('estado.nome',$nomeEstado)
                        ->like('municipio.nome', $nomeMunicipio)
                        ->get()->getRowObject();
        $db->close();
        return $resultados;
    }
    
    public function getEstadoById($id_estado){
        
        $db = db_connect();
        $resultados = $db->table('estado')->where('id_estado',$id_estado)->get()->getRowObject();
        $db->close();
        return $resultados;
    }
}