<?php

namespace App\Database\Seeds;

class UsuarioSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        // Usuário administrador padrão
        $data = [
            'nome' => 'Admin',
            'email' => 'admin@admin.com',
            'senha' => password_hash("102030", PASSWORD_DEFAULT),
            'tipo_usuario_id' => '1',

        ];
    
        $this->db->table('usuario')->insert($data);
    }
}