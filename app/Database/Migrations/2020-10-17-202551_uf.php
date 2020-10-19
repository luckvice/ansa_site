<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Uf extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_uf' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('uf');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
