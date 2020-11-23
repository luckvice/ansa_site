<?php

namespace App\Models;

use CodeIgniter\Model;

class Pets extends Model
{
    /*
        getPets Filtro Avançado de busca
        get de todas as informações de todos os pets com filtros

        $estado_cidade Pode ser id ou nome de estado e cidade
        $filtrarEstado tipo bool True lista pets por estado False lista pets por municipio
        $filtros tipo bool True ativa modo filtro Por ID Municipio ou ID Estado  
    */
    public function getPets($estado_cidade, $filtrarEstado = true, $filtros = false ,$todasEspecies = true, $especie = null, $todosSexos = true, $sexo = null, $todosTamanhos = true, $tamanho = null, $adotado = 0, $paginacao = 1, $limit = 12, $numRows = false){
        $db = db_connect();
        $resultados = $db->table('pet')
            ->select('pet.*')
            ->select('galeria.imagem')
            ->select('saude.id_pet              as saude_id_pet, vermifugado, vacinado, castrado, cuidados_especiais')
            ->select('personalidade.id_pet      as personalidade_id_pet, docil, agressivo, calmo, brincalhao, sociavel, arisco, independente, carente, tenso, assustado, casa, apartamento')
            ->select('porte.descricao           as porte_descricao')
            ->select('especie.descricao         as especie_descricao')
            ->select('sexo.descricao            as sexo_descricao')
            ->select('faixa_etaria.descricao    as faixa_etaria_descricao')
            ->select('municipio.nome            as municipio_nome, municipio.uf')
            ->select('estado.nome               as estado_nome')
                ->join('porte',                 'porte.id_porte                 = pet.id_porte',        'left')
                ->join('especie',               'especie.id_especie             = pet.id_especie',      'left')
                ->join('sexo',                  'sexo.id_sexo                   = pet.id_sexo',         'left')
                ->join('faixa_etaria',          'faixa_etaria.id_faixa_etaria   = pet.id_faixa_etaria', 'left')
                ->join('municipio',             'municipio.id_municipio         = pet.id_municipio',    'left')
                ->join('estado',                'estado.id_estado               = pet.id_estado',       'left')
                ->join('saude',                 'saude.id_pet                   = pet.id_pet',          'left')
                ->join('personalidade',         'personalidade.id_pet           = pet.id_pet',          'left')
                ->join('galeria',               'galeria.id_pet                 = pet.id_pet',          'left')
                ->where('capa',1)
                ->where('adotado',$adotado)
                ->where('pet.excluido',0);
                $resultados = $resultados->limit($limit,$paginacao);
                if($filtrarEstado == true):
                    if($filtros == true):
                        $resultados = $resultados->where('pet.id_estado',$estado_cidade);
                    else:
                        $resultados = $resultados->like('estado.nome',$estado_cidade);
                    endif;   
                else: 
                    if($filtros == true):
                        $resultados = $resultados->where('pet.id_municipio',$estado_cidade);
                    else:
                        $resultados = $resultados->like('municipio.nome',$estado_cidade);
                    endif;
                endif;
                if($todasEspecies == false):
                    $resultados = $resultados->where('pet.id_especie',$especie);
                endif;    
                if($todosSexos == false):
                    $resultados = $resultados->where('pet.id_sexo',$sexo);
                endif;   
                if($todosTamanhos == false):
                    $resultados = $resultados->where('pet.id_porte',$tamanho);
                endif;              
                    if($numRows == false):
                    $resultados = $resultados->get()->getResultObject();
                    else:
                        $resultados = $resultados->countAllResults();    
                    endif;
        $db->close();
        return $resultados;
    }

    public function insertPet($dados, $galeria, $id_usuario, $data_cadastro){
        $db = db_connect();
        //Insert Table pets
        $data = [
            'id_usuario'        => $id_usuario,
            'nome'              => $dados['nome'],
            'descricao'         => $dados['descricao'],
            'id_porte'          => $dados['porte'],
            'id_especie'        => $dados['especie'],
            'id_sexo'           => $dados['sexo'],
            'id_faixa_etaria'   => $dados['idade'],
            'id_estado'         => $dados['estado'],    
            'id_municipio'      => $dados['cidade'],
            'data_cadastro'     => $data_cadastro,  
            'excluido'          => 0
        ];
        $db->transStart();
        $db->table('pet')->insert($data);
        $lastId = $db->insertID();
        $resultados = $db->error();
        if ($resultados['code'] != 0) { 
            return $resultados;
        }
   
        $colNames = $db->getFieldNames('personalidade');
        $data = [];
        foreach($colNames as $key=>$value){
          if(!isset($dados[$value])){
             $dados[$value] = 0;
          }
          echo $value.' '.$dados[$value].'<br>';
          $data[$value] = $dados[$value];
        }
        $data['id_pet'] = $lastId;
        $db->table('personalidade')->insert($data);
        $resultados = $db->error();
        if ($resultados['code'] != 0) { 
            return $resultados;
        }

        $colNames = $db->getFieldNames('saude');
        $data = [];
        foreach($colNames as $key=>$value){
          if(!isset($dados[$value])){
             $dados[$value] = 0;
          }
          echo $value.' '.$dados[$value].'<br>';
          $data[$value] = $dados[$value];
        }
        $data['id_pet'] = $lastId;

        $db->table('saude')->insert($data);
        $resultados = $db->error();
        if ($resultados['code'] != 0) { 
            return $resultados;
        }
        
        foreach($galeria as $key=>$value){
            if(!$value == null){
                $capa = false;
                if($key == 'imagem1'):$capa = true; endif;
                    $dados = ['id_pet'=> $lastId, 'imagem'=>$value,'capa' => $capa];   
             $db->table('galeria')->insert($dados);
            }
        }
    
        $db->transComplete();
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
        $db = db_connect();
        $resultados = $db->table('pet')
            ->select('pet.*')
            ->select('galeria.imagem')
            ->select('usuario.nome              as usuario_nome, usuario.telefone, usuario.email')
            ->select('saude.id_pet              as saude_id_pet, vermifugado, vacinado, castrado, cuidados_especiais')
            ->select('personalidade.id_pet      as personalidade_id_pet, docil, agressivo, calmo, brincalhao, sociavel, arisco, independente, carente, tenso, assustado, casa, apartamento')
            ->select('porte.descricao           as porte_descricao')
            ->select('especie.descricao         as especie_descricao')
            ->select('sexo.descricao            as sexo_descricao')
            ->select('faixa_etaria.descricao    as faixa_etaria_descricao')
            ->select('municipio.nome            as municipio_nome, municipio.uf')
                ->join('usuario',               'usuario.id_usuario             = pet.id_usuario',      'left')
                ->join('porte',                 'porte.id_porte                 = pet.id_porte',        'left')
                ->join('especie',               'especie.id_especie             = pet.id_especie',      'left')
                ->join('sexo',                  'sexo.id_sexo                   = pet.id_sexo',         'left')
                ->join('faixa_etaria',          'faixa_etaria.id_faixa_etaria   = pet.id_faixa_etaria', 'left')
                ->join('municipio',             'municipio.id_municipio         = pet.id_municipio',    'left')
                ->join('saude',                 'saude.id_pet                   = pet.id_pet',          'left')
                ->join('personalidade',         'personalidade.id_pet           = pet.id_pet',          'left')
                ->join('galeria',               'galeria.id_pet                 = pet.id_pet',          'left')
                ->where('capa',1)
                ->where('pet.excluido',0)
                ->where('pet.id_pet', $id_pet)
                ->get()->getRowObject();
        $db->close();
        return $resultados;
    }

    public function getPetsByUsuario($id_usuario){//get todos pets por id usuario
        $db = db_connect();
        $resultados = $db->table('pet')
            ->select('pet.*')
            ->select('galeria.imagem')
            ->select('usuario.nome              as nome_usuario, usuario.telefone, usuario.email')
            ->select('saude.id_pet              as saude_id_pet, vermifugado, vacinado, castrado, cuidados_especiais')
            ->select('personalidade.id_pet      as personalidade_id_pet, docil, agressivo, calmo, brincalhao, sociavel, arisco, independente, carente, tenso, assustado, casa, apartamento')
            ->select('porte.descricao           as porte_descricao')
            ->select('especie.descricao         as especie_descricao')
            ->select('sexo.descricao            as sexo_descricao')
            ->select('faixa_etaria.descricao    as faixa_etaria_descricao')
            ->select('municipio.nome            as municipio_nome, municipio.uf')
                ->join('usuario',               'usuario.id_usuario             = pet.id_usuario',      'left')
                ->join('porte',                 'porte.id_porte                 = pet.id_porte',        'left')
                ->join('especie',               'especie.id_especie             = pet.id_especie',      'left')
                ->join('sexo',                  'sexo.id_sexo                   = pet.id_sexo',         'left')
                ->join('faixa_etaria',          'faixa_etaria.id_faixa_etaria   = pet.id_faixa_etaria', 'left')
                ->join('municipio',             'municipio.id_municipio         = pet.id_municipio',    'left')
                ->join('saude',                 'saude.id_pet                   = pet.id_pet',          'left')
                ->join('personalidade',         'personalidade.id_pet           = pet.id_pet',          'left')
                ->join('galeria',               'galeria.id_pet                 = pet.id_pet',          'left')
                ->where('pet.id_usuario', $id_usuario)
                ->where('galeria.capa',1)
                ->where('pet.excluido',0)
                ->get()->getResultObject();
        $db->close();
        return $resultados;   
    }

    public function getUserByIdPet($id_pet){
        $db = db_connect();
        $resultados = $db->table('pet')->select('pet.id_usuario')->where('id_pet', $id_pet)->get()->getRowArray();
        $db->close();
        return $resultados;
    }

    public function getAdotado($id_pet){
        $db = db_connect();
        $resultados = $db->table('pet')->select('pet.adotado')->where('id_pet', $id_pet)->get()->getRowObject();
        $db->close();
        return $resultados;
    }

    public function setAdotado($id_pet, $id_usuario, $status){
        $db = db_connect();
        $data = ['adotado' => $status];
        $db->table('pet')->where('id_pet', $id_pet)->where('id_usuario', $id_usuario)->update($data);
        $resultados = $db->affectedRows();
        $db->close();
        return $resultados;
    }

    public function setExcluido($id_pet, $id_usuario){
        $db = db_connect();
        $data = ['excluido' => 1];
        $db->table('pet')->where('id_pet', $id_pet)->where('id_usuario', $id_usuario)->update($data);
        $resultados = $db->affectedRows();
        $db->close();
        return $resultados;
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
        $resultados = $db->table('galeria')->where('id_pet', $id_pet)->where('capa',0)->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function getAdotadosByIdUsuario($id_usuario){
        $db = db_connect();
        $resultados = $db->table('pet')->where('id_usuario', $id_usuario)->where('adotado',1)->countAllResults();
        $db->close();
        return $resultados;
    }

    public function getDivulgadosByIdUsuario($id_usuario){
        $db = db_connect();
        $resultados = $db->table('pet')->where('id_usuario', $id_usuario)->where('adotado',0)->countAllResults();
        $db->close();
        return $resultados;    
    }

    public function getNumPets(){
        $db = db_connect();
        $resultados = $db->table('pet')->countAllResults();
        $db->close();
        return $resultados;
    }

    public function getPetsByRecomendacao($desejo) {
        
        $db = db_connect();
        $resultados = $db->table('pet')
            ->select('pet.*')
                ->where('pet.adotado',0)
                ->where('pet.excluido',0);

                if($desejo->id_cidade != '0')
                    $resultados = $resultados->where('pet.id_municipio', $desejo->id_cidade);

                if($desejo->id_sexo != '0')
                    $resultados = $resultados->where('pet.id_sexo', $desejo->id_sexo);

                if($desejo->id_porte != '0')
                    $resultados = $resultados->where('pet.id_porte', $desejo->id_porte);                    

                if($desejo->id_especie != '0')
                    $resultados = $resultados->where('pet.id_especie', $desejo->id_especie);
                    
                $resultados = $resultados->get()->getResultObject();

        $db->close();

        return $resultados;
    }
}
