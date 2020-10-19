<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pets extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pet' =>[
				'type'				=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
				'auto_increment' 	=> true,
			],
			'nome'=>[
				'type'				=> 'VARCHAR',	
				'constraint' 		=> 15,
			],
			'adotado'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_usuario'=>[
				'type'           	=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
			],
			'id_porte'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_especie'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_sexo'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_faixa_etaria'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_uf'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'id_cidade'=>[
				'type'				=> 'INT',	
				'constraint' 		=> 5,
			],
			'data_cadastro DATETIME default CURRENT_TIMESTAMP',
					'data_atl_cad DATETIME default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
		]);
		$this->forge->addKey('id_pet', true);
		$this->forge->addForeignKey('id_usuario','usuarios','id_usuario','CASCADE','CASCADE');
		$this->forge->createTable('pets');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
