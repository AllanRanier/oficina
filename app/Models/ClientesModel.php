<?php 
namespace App\Models;

use CodeIgniter\Model;

class ClientesModel extends Model{

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
        'email',
        'cpf',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'telefone',
    ];

    protected $returnType = 'object';
}