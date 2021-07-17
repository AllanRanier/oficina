<?php

namespace App\Controllers;
use App\Models\OrcamentoModel;
use App\Models\ClientesModel;
use App\Models\ServicoModel;




class OrcamentoController extends BaseController
{
    protected $OcamentoModel;
    protected $ClienteModel;
    protected $ServicoModel;
    public function __construct(){
        $this->OcamentoModel = new OrcamentoModel();
        $this->ClienteModel = new ClientesModel();
        $this->ServicoModel = new ServicoModel();
    }

    /**
     * Carrega a lista dos Orçamento
     *
     * @return void
     */
	public function index()   
	{
        $base_url = '/servicos';

		return $this->twig->render("orcamento/index.html.twig",[
			'title' => 'Orçamentos',
            'baseRoute' => $base_url
		]);
	}

    public function create()
    {   
        $base_url = '/servicos';       
        $orcamento = $this->OcamentoModel->getOrcamento();
        $clientes = $this->ClienteModel->findAll();
        $servicos = $this->ServicoModel->findAll();

        return $this->twig->render('orcamento/form.html.twig', [
            'title' => 'Adicionar novo Orçamento',
            'orcamento' => $orcamento,
            'clientes' => $clientes,
            'servicos' => $servicos,
            'baseRoute' => $base_url
        ]);
    }

}
