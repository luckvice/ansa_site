<?php

namespace App\Models;

/*
[ANSA Project]

Model Usuário.

*/
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
            $lastId = $db->insertID();
            $db->close();
            return $lastId;
        }
        $db->close();
        return $resultados;
    }

    public function updateSenha($id_usuario, $senha){
        $db = db_connect();
        $data = ['senha' => $senha];
        $db->table('usuario')->where('id_usuario', $id_usuario)->update($data);
        $db->close();
    }

    public function updateUsuario($id_usuario, $email, $telefone, $data_alteracao)
    {
        $db = db_connect();
        $data = [
            'login'             => $email,
            'email'             => $email,
            'telefone'          => $telefone,
            'data_alteracao'    => $data_alteracao
        ];
        $db->table('usuario')->where('id_usuario', $id_usuario)->update($data);
        $db->close();
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
