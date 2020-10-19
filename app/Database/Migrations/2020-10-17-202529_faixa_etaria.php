<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FaixaEtaria extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_faixa_etaria' =>[
						'type'				=> 'INT',
						'constraint' 		=> 5,
			],
			'descricao'=>[
						'type'				=> 'VARCHAR',	
						'constraint' 		=> 15,
			],
		]);
		$this->forge->createTable('faixa_etaria');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
