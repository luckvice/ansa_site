<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Deposimento extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_depoimento' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
						'unsigned'       	=> true,
						'auto_increment' 	=> true,
			],
			'id_pet' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'id_usuario' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'depoimento'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 512,
			],
		]);
		$this->forge->addKey('id_depoimento', true);
		$this->forge->createTable('depoimentos');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
