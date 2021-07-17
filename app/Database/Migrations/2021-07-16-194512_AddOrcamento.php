<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrcamento extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'SERIAL',
			],
			'cliente_id' => [
				'type' => 'INT',
			],
			'servico_id' => [
				'type' => 'INT',
			],
			'descricao' => [
				'type' => 'TEXT',
				'null' => true,
			],
			'situacao' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'valor' => [
				'type' => 'INT',
			],
			'total' => [
				'type' => 'INT',
			],
			'created_at date DEFAULT current_date NOT NULL '
		]);	
		$this->forge->addKey('id', true);
		$this->forge->addForeignKey('cliente_id', 'clientes', 'id', 'CASCADE', 'CASCADE');
		$this->forge->addForeignKey('servico_id', 'servico', 'id', 'CASCADE', 'CASCADE');
		$this->forge->createTable('orcamento');
	}

	public function down()
	{
		$this->forge->dropTable('orcamento');
	}
}
