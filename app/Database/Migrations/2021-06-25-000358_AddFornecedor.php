<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFornecedor extends Migration
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
			'cnpj' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],				
			'telefone' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],				
			'cep' => [
				'type' => 'VARCHAR',
				'constraint' => '20',
			],				
			'logradouro' => [
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
		$this->forge->createTable('fornecedor');
	}

	public function down()
	{
		$this->forge->dropTable('fornecedor');
	}
}
