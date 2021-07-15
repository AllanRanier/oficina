<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddServico extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'SERIAL',
			],
			'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			]
		]);	
		$this->forge->addKey('id', true);
		$this->forge->createTable('servico');
	}

	public function down()
	{
		$this->forge->dropTable('servico');
	}
}
