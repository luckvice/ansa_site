<?php

namespace App\Models;

use App\Models\Ongs;

/*
[ANSA Project]

Model Usuário.

*/
class Usuarios
{
    public function inserirUsuario($id_nivel, $nome, $login, $senha, $email, $telefone, $id_cidade, $data_cadastro)
    {
        $db = db_connect();
        $data = [
            'id_nivel'      => $id_nivel,
            'nome'          => $nome,
            'login'         => $login,
            'senha'         => $senha,
            'email'         => $email,
            'telefone'      => $telefone,
            'id_cidade'     => $id_cidade,
            'data_cadastro' => $data_cadastro
        ];

        $db->table('usuario')->insert($data);

        $resultados = $db->error();
        
        if ($resultados['code'] == 0) { //Se nao teve erros
            $lastId = $db->insertID();
            $db->close();
            // Insere a ONG caso a checkbox esteja marcada
            if($id_nivel == 3) {
                $ong = new Ongs;
                $ong->inserirOng($lastId, '', '', '', '', '', '', date("Y-m-d H:i:s"), '', 1);
            }
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

    public function updateUsuario($id_usuario, $dados)
    {
        $db = db_connect();

        $dados = [
            'nome'              => $dados['nome'],
            'telefone'          => $dados['telefone'],
            'email'             => $dados['email'],
            'login'             => $dados['email'],
            'id_cidade'         => $dados['cidade'],
            'data_alteracao'    => date("Y-m-d H:i:s"),
            'avatar'            => $dados['avatar']

        ];
        if($dados['avatar'] == null):unset($dados['avatar']);endif;
      
        $db->table('usuario')->where('id_usuario', $id_usuario)->update($dados);
        $resultados = $db->affectedRows();
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
        $resultados = $db->table('usuario')->select('usuario.email, usuario.id_usuario, usuario.nome')->getWhere(['email' => $email])->getRow();
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
