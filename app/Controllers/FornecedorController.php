<?php

namespace App\Controllers;

use App\Models\FornecedorModel;

class FornecedorController extends BaseController
{
    protected $base_url = '/fornecedor';
    protected $fornecedorModel;

    public function __construct(){
        $this->fornecedorModel = new FornecedorModel;
    }
    /**
     * Carrega a lista de usuarios
     *
     * @return void
     */
	public function index()   
	{
		return $this->twig->render("fornecedor/index.html.twig",[
			'title' => 'Fornecedores',
            'baseUrl' => $this->base_url
		]);
	}

    public function create(){
        // $fornecedorModel = $this->fornecedorModel->findAll();
        // dd($fornecedorModel);

        return $this->twig->render("fornecedor/form.html.twig",[
            'title' => 'Cadastrar Fornecedor',
            'baseUrl' => $this->base_url
        ]);
    }

    public function save(){
        if ($this->request->getMethod() === 'post') {
    
            $form = $this->request->getPost();

            $data = [
                'nome' => trim($this->request->getPost('nome')),
                'email' => trim($this->request->getPost('email')),
                'cnpj' => trim($this->request->getPost('cnpj')),
                'telefone' => trim($this->request->getPost('telefone')),
                'cep' => trim($this->request->getPost('cep')),
                'logradouro' => trim($this->request->getPost('logradouro')),
            ];
            // dd($data);

            if (\key_exists('id', $this->request->getPost()))
                $data['id'] = $this->request->getPost('id');

            

            $this->UsuarioModel->save($data);

            if (\key_exists('id', $this->request->getPost()))
                $this->session->setFlashdata('success_notice', 'Fornecedor atualizado com sucesso!');
            else
                $this->session->setFlashdata('success_notice', 'Fornecedor cadastrado com sucesso!');

            return redirect()->to('/fornecedor');
        }
    }
   
}
