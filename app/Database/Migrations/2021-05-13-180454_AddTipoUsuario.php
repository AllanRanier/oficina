<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTipoUsuario extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
				'type' => 'SERIAL',
			],
			'nome' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],	
			'uf' => [
				'type' => 'VARCHAR',
				'constraint' => '2',
			],		
		]);
		$this->forge->addKey('id', true);
		$this->forge->addKey('nome');
		$this->forge->createTable('tipo_usuario');
	}

	public function down()
	{
		$this->forge->dropTable('tipo_usuario');
	}
}
