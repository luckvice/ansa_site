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
        ];

        $db->table('recomendacao')->insert($data);
        $resultados = $db->error();
        $lastId     = $db->insertID();
        $db->table('disparo_recomendacao')->insert($data = ['id_recomendacao'=> $lastId]);
        $db->close();

        return $resultados;
    }


    public function removerRecomendacao($id_recomendacao){
        $db = db_connect();
        $db->table('recomendacao')->where('id_recomendacao', $id_recomendacao)->delete();
        $db->close();
    }
}