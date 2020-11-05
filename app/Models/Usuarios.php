<?php

namespace App\Models;


class Usuarios
{
    public function inserirUsuario($id_nivel, $nome, $login, $senha, $email, $telefone, $data_cadastro)
    {
        $db = db_connect();
        $data = [
            'id_nivel'      => $id_nivel,
            'nome'          => $nome,
            'login'         => $login,
            'senha'         => $senha,
            'email'         => $email,
            'telefone'      => $telefone,
            'data_cadastro' => $data_cadastro
        ];

        $db->table('usuario')->insert($data);
        $resultados = $db->error();
        if ($resultados['code'] == 0) { //Se nao teve erros
            return $db->insertID();
        }
        $db->close();
        return $resultados;
    }

    public function getUsuarioById($id_usuario)
    {
        $db = db_connect();
        $resultados = $db->table('usuario')->where('id_usuario', $id_usuario)->get()->getRowObject();
        $db->close();
        return $resultados;
    }

    public function checkExistsEmail($email)
    {
        $db = db_connect();
        $resultados = $db->table('usuario')->getWhere(['email' => $email])->getRow();
        $db->close();
        return $resultados;
    }

    public function checkLogin($email, $senha)
    {
        $db = db_connect();
        //Outra alternativa $resultados = $db->query("SELECT * FROM usuario WHERE email = '{$email}'");
        $resultados = $db->table('usuario')->getWhere(['email' => $email, 'senha' => $senha])->getRowObject();
        $db->close();
        return $resultados;
    }
}
