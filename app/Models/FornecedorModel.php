<?php 
namespace App\Models;

use CodeIgniter\Model;

class FornecedorModel extends Model{

    protected $table = 'fornecedor';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nome',
        'email',
        'cnpj',
        'telefone',
        'cep',
        'logradouro',
        'bairro',
        'cidade',
        'numero',
    ];

    protected $returnType = 'object';
}