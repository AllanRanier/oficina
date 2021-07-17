<?php 
namespace App\Models;

use CodeIgniter\Model;

class OrcamentoModel extends Model{

    protected $table = 'orcamento';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'cliente_id',
        'servico_id',
        'descricao',
        'situacao',
        'valor',
        'total',
        'created_at',
    ];

    public function getOrcamento(){
        return $this->db->table("orcamento as o")
                        ->select("o.id, c.nome as cliente, s.nome as servico, o.descricao, o.situacao, o.valor, o.total")
                        ->join("clientes as c", "c.id = o.cliente_id")
                        ->join("servico as s", "s.id = o.servico_id")
                        ->get()
                        ->getResult();
    }

    protected $returnType = 'object';
}