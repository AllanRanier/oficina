<?php 
namespace App\Models;

use CodeIgniter\Model;

class EstoqueModel extends Model{

    protected $table = 'estoque';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'produto',
        'fornecedor_id',
        'quantidade',
    ];

    protected $returnType = 'object';
}