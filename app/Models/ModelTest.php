<?php

namespace App\Models;

class ModelTest
{
    public function listarUsuarios()
    {
        $db = db_connect();
        $resultados = $db->table('usuario')->get()->getResultObject();
        $db->close();
        return $resultados;
    }

    public function checkLogin($email, $senha)
    {
        $db = db_connect();
        //$resultados = $db->query("SELECT * FROM usuario WHERE email = '{$email}'");
        $resultados = $db->table('usuario')->getWhere(['email' => $email, 'senha' => $senha])->getRowObject();
        $db->close();
        return $resultados;
    }

    public function inserirUsuario($nome, $senha, $email)
    {
        $db = db_connect();
        $data = [
            'nome'  => $nome,
            'senha'  => $senha,
            'email'  => $email
        ];

        $db->table('usuario')->insert($data);
        $resultados = $db->error();
        if ($resultados['code'] == 0) { //Se nao teve erros
            return $db->insertID();
        }
        $db->close();
        return $resultados;
    }

    public function updateUsuario($nome, $senha, $email, $id)
    {
        $db = db_connect();
        $data = [
            'nome'  => $nome,
            'senha'  => $senha,
            'email'  => $email
        ];

        $db->table('usuario')->where('id_usuario', $id)->update($data);
        $db->close();
    }
}
