<?php

namespace App\Database\Seeds;

class TipoUsuarioSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {

        // Usuário administrador padrão
        $data = [
            'nome' => 'Administrador',
        ];
    
        $this->db->table('tipo_usuario')->insert($data);
    }
}