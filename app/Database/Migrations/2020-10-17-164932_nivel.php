<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nivel extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_nivel' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('nivel');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('nivel');
	}
}
