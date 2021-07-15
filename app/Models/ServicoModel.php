<?php 
namespace App\Models;

use CodeIgniter\Model;

class ServicoModel extends Model{

    protected $table = 'servico';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome'
    ];

    protected $returnType = 'object';
}