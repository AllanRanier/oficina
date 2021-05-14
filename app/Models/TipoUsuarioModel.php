<?php 
namespace App\Models;

use CodeIgniter\Model;

class TipoUsuarioModel extends Model{

    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
    ];

    protected $returnType = 'object';
}