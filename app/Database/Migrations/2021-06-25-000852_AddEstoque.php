<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddEstoque extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'SERIAL',
			],
			'produto' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],	
			'fornecedor_id' => [
				'type' => 'INT',
			],						
			'quantidade' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],						
		]);
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('fornecedor_id', 'fornecedor', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('estoque');
	}

	public function down()
	{
		$this->forge->dropTable('estoque');
	}
}
