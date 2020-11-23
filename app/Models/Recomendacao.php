<?php

namespace App\Models;

class Recomendacao
{
    public function inserirRecomedacao($id_cidade, $id_especie, $id_porte, $id_sexo, $telefone, $email)
    {
        $db = db_connect();

        $data = [
            'id_cidade'      => $id_cidade,
            'id_especie'     => $id_especie,
            'id_porte'       => $id_porte,
            'id_sexo'        => $id_sexo,
            'telefone'       => $telefone,
            'email'          => $email,
            'data_cadastro' => date("Y-m-d H:i:s")
        ];

        $db->table('recomendacao')->insert($data);
        $resultados = $db->error();
        $lastId     = $db->insertID();
        $resultados = $db->affectedRows();
        $db->table('disparo_recomendacao')->insert($data = ['id_recomendacao'=> $lastId]);
        $db->close();

        return $resultados;
    }

    public function limpar($recomendacoes_para_excluir){
        $db = db_connect();

        foreach ($recomendacoes_para_excluir as $id_disparo_recomendacao) {
            $db->table('disparo_recomendacao')->where('id_disparo_recomendacao', $id_disparo_recomendacao)->delete();
        }

        $db->close();
    }

    public function listarRecomendacoes() {
        
        $db = db_connect();
        $resultados = $db->table('disparo_recomendacao')
            ->select('disparo_recomendacao.id_disparo_recomendacao')
            ->select('recomendacao.*')
            ->join('recomendacao', 'disparo_recomendacao.id_recomendacao = recomendacao.id_recomendacao', 'left');
            
        $resultados = $resultados->get()->getResultObject();
        
        $db->close();

        return $resultados;
    }
}