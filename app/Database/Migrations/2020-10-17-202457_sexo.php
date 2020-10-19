<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sexo extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_sexo' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('sexo');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
