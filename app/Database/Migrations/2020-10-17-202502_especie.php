<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Especie extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_especie' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('especie');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
