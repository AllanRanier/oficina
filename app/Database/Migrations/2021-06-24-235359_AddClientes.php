<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddClientes extends Migration
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
			],	
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],		
			'cpf' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],				
			'telefone' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],				
			'cep' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],				
			'rua' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],				
			'bairro' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],				
			'cidade' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],				
			'numero' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],				
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('clientes');
	}

	public function down()
	{
		$this->forge->dropTable('clientes');
	}
}
