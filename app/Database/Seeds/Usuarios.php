<?php
namespace App\Database\Seeds;

class Usuarios extends \CodeIgniter\Database\Seeder{

    public function run(){
        $data = [
            'nome' => 'Lucas Soares',
            'senha' => md5('123456'),
            'email' => 'lucasmarcelo93@gmail.com',
            'telefone' => '(51)000000000',
            'avatar' => '',
            'id_nivel' => 1
        ];
        $this->db->table('usuarios')->insert($data);
    }
}