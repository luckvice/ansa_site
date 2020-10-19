<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cidade extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_cidade' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('cidade');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
