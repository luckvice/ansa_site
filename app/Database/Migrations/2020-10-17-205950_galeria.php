<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Galeria extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_galeria' =>[
				'type'				=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
				'auto_increment' 	=> true,
			],
			'id_pet' =>[
				'type'				=> 'INT',
				'constraint'     	=> 5,
				'unsigned'       	=> true,
			],
			'imagem' =>[
				'type'				=> 'VARCHAR',
			],
			'capa' =>[
				'type'				=> 'INT',
			],
		]);
		$this->forge->addKey('id_pet', true);
		$this->forge->addForeignKey('id_pet','pets','id_pet','CASCADE','CASCADE');
		$this->forge->createTable('galeria');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
