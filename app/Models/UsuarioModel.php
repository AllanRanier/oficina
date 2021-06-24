<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model{

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
        'email',
        'senha',
        'tipo_usuario_id',
    ];

    public function getUsuario(){
        return $this->db->table("usuario as u")
                        ->select("u.nome, u.email, tu.nome as tipo_usuario")
                        ->join("tipo_usuario as tu", "tu.id = u.tipo_usuario_id")
                        ->get()
                        ->getRow();
    }

    protected $returnType = 'object';
}