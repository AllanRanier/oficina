<?php

namespace App\Controllers;
use App\Models\ServicoModel;


class ServicoController extends BaseController
{
    protected $ServicoModel;
    public function __construct(){
        $this->ServicoModel = new ServicoModel;
    }

    /**
     * Carrega a lista dos serviços
     *
     * @return void
     */
	public function index()   
	{
        $Servicos = $this->ServicoModel->findAll();
        $base_url = '/servicos';   


		return $this->twig->render("servico/index.html.twig",[
			'title' => 'Serviços',
            'servico' => $Servicos,
            'baseRoute' => $base_url
		]);
	}

}
