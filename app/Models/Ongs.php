<?php

namespace App\Models;

class Ongs
{
    public function inserirOng($id_usuario, $avatar, $nome, $site, $facebook, $twitter, $instagram, $data_cadastro, $data_alteracao, $excluido)
    {
        $db = db_connect();
        $data = [
            'id_usuario'        => $id_usuario,
            'avatar'            => $avatar,
            'nome'              => $nome,
            'site'              => $site,
            'facebook'          => $facebook,
            'twitter'           => $twitter,
            'instagram'         => $instagram,
            'data_cadastro'     => $data_cadastro,
            'data_alteracao'    => $data_alteracao,
            'excluido'          => $excluido
        ];

        $db->table('ong')->insert($data);

        $resultados = $db->error();
        
        if ($resultados['code'] == 0) { //Se nao teve erros
            $lastId = $db->insertID();
            $db->close();
            return $lastId;
        }
        
        $db->close();

        return $resultados;
    }

    public function updateOng($id_ong, $dados)
    {
        $db = db_connect();
        $data = [
            'avatar'            => $dados['avatar'],
            'nome'              => $dados['nome'],
            'site'              => $dados['site'],
            'facebook'          => $dados['facebook'],
            'twitter'           => $dados['twitter'],
            'instagram'         => $dados['instagram'],
            'descricao'         => $dados['descricao'],
            'data_alteracao'    => date("Y-m-d")
        ];

        $db->table('ong')->where('id_ong', $id_ong)->update($data);

        $db->close();
    }

    public function getOngById($id_ong)
    {
        $db = db_connect();

        $resultados = $db->table('ong')->where('id_ong', $id_ong)->get()->getRowObject();
        
        $db->close();
        
        return $resultados;
    }

    public function getOngByIdUsuario($id_usuario)
    {
        $db = db_connect();

        $resultados = $db->table('ong')->where('id_usuario', $id_usuario)->get()->getRowObject();
        
        $db->close();
        
        return $resultados;
    }

}
