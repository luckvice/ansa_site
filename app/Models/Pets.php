<?php

namespace App\Models;

use CodeIgniter\Model;

class Pets extends Model
{
    public function getPets($limit = 1){//get de todas as informações de todos os pets
        $db = db_connect();
        $resultados = $db->table('pet')
            ->select('pet.*')
            ->select('galeria.id_pet            as galeria_id_pet, galeria.imagem')
            ->select('saude.id_pet              as saude_id_pet, vermifugado, vacinado, castrado, cuidados_especiais')
            ->select('personalidade.id_pet      as personalidade_id_pet, docil, agressivo, calmo, brincalhao, sociavel, arisco, independente, carente, tenso, assustado, casa, apartamento')
            ->select('porte.descricao           as porte_descricao')
            ->select('especie.descricao         as especie_descricao')
            ->select('sexo.descricao            as sexo_descricao')
            ->select('faixa_etaria.descricao    as faixa_etaria_descricao')
            ->select('municipio.nome            as municipio_nome, municipio.uf')
                ->join('galeria',               'galeria.id_pet                 = pet.id_pet ',        )
                ->join('porte',                 'porte.id_porte                 = pet.id_porte',        'left')
                ->join('especie',               'especie.id_especie             = pet.id_especie',      'left')
                ->join('sexo',                  'sexo.id_sexo                   = pet.id_sexo',         'left')
                ->join('faixa_etaria',          'faixa_etaria.id_faixa_etaria   = pet.id_faixa_etaria', 'left')
                ->join('municipio',             'municipio.id_municipio         = pet.id_municipio',    'left')
                ->join('saude',                 'saude.id_pet                   = pet.id_pet',          'left')
                ->join('personalidade',         'personalidade.id_pet           = pet.id_pet',          'left')
                ->limit($limit)
                ->get()->getResultObject();
        $db->close();
        return $resultados;

    }

    public function getGaleriaPet($id_pet){
        $db = db_connect();
        $resultados = $db->table('galeria')->select('galeria.*')
                        ->join('pet','galeria.id_pet = pet.id_pet ')->where('galeria.id_pet',$id_pet)->get()->getResultObject();
                $db->close();
        return $resultados;
    }

    public function getPet($id_pet){//get de todas informações de um pet e usuario que o cadastrou
        
    }

    public function getPetsByUsuario($id_usuario){//get todos pets por id usuario
        
    }

    public function getPorteById($id_porte){
        $db = db_connect();
        $resultados = $db->table('porte')->where('id_porte', $id_porte)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getSaudeById($id_saude){
        $db = db_connect();
        $resultados = $db->table('saude')->where('id_saude', $id_saude)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getSexoById($id_sexo){
        $db = db_connect();
        $resultados = $db->table('sexo')->where('id_sexo', $id_sexo)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getFaixaEtariaById($id_faixa_etaria){
        $db = db_connect();
        $resultados = $db->table('sexo')->where('id_faixa_etaria', $id_faixa_etaria)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getPersonalidade($id_personalidade){
        $db = db_connect();
        $resultados = $db->table('personalidade')->where('id_personalidade', $id_personalidade)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getGaleria($id_pet){
        $db = db_connect();
        $resultados = $db->table('galeria')->where('id_pet', $id_pet)->get()->getResultObject();
        $db->close();
        return $resultados;
    }
}
