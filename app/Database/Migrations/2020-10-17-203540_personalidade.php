<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Personalidade extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_pet' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'docil' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'agressivo' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'calmo' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],	
			'sociavel' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'arisco' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'indepedente' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'carente' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'tenso' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'assustado' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'casa' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
			'apartamento' =>[
				'type'				=> 'INT',
				'constraint' 		=> 5,
			],
		]);
		$this->forge->createTable('personalidade');
	}
	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
