<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Usuarios extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_usuario'          => [
						'type'           	=> 'INT',
						'constraint'     	=> 5,
						'unsigned'       	=> true,
						'auto_increment' 	=> true,
			],
			'nome' => [
						'type' 				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'login' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'senha' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'email' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'telefone' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'cep' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],	
			'avatar' => [
						'type'				=> 'VARCHAR',
						'constraint' 		=> 256,
			],
			'id_nivel' =>[
				'type'						=> 'INT',
				'constraint' 				=> 5,
			],
		'data_cadastro DATETIME default CURRENT_TIMESTAMP',
				'data_atl_cad DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
	]);
	$this->forge->addKey('id_usuario', true);
	//$this->forge->addForeignKey('id_nivel','usuarios','id_nivel','CASCADE','CASCADE');
	$this->forge->createTable('usuarios');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('nivel');
	}
}
