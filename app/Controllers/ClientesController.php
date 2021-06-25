<?php

namespace App\Controllers;

class ClientesController extends BaseController
{
	public function __contruct(){

	}

	public function index()
	{
		return $this->twig->render("clientes/index.html.twig",[
			'title' => 'Clientes'
		]);
	}

    public function create()
    {
        $base_url = '/clientes';   

        return $this->twig->render('clientes/form.html.twig', [
            'title' => 'Cadastrar novo Cliente',
            'base_url' => $base_url
        ]);
    }
}
