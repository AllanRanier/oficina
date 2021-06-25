<?php

namespace App\Controllers;
use App\Models\ClientesModel;

class ClientesController extends BaseController
{

    protected $ClientesModel;
    protected $base_url;

    /**
     * carregar a index do /clientes
     *
     * @return void
     */

	public function index()
	{
        $this->ClientesModel = new ClientesModel;
        $this->base_url = '/clientes';
        $clientes = $this->ClientesModel->findAll();

		return $this->twig->render("clientes/index.html.twig",[
            'title' => 'Clientes',
            'cliente' => $clientes,
            'baseUrl' => $this->base_url
		]);
	}

    /**
     * Carregar o formulario de cadastrar o cliente
     *
     * @return void
     */

    public function create()
    {   
        $this->base_url = '/clientes';
        return $this->twig->render('clientes/form.html.twig', [
            'title' => 'Cadastrar novo Cliente',
            'BaseUrl' => $this->base_url
        ]);
    }

     /**
     * Carrega o formulario para alterar o CLiente
     *
     * @param string $id
     * @return void
     */

    public function update(string $id){
        $this->base_url = '/clientes';
        $this->ClientesModel = new ClientesModel;
        $clientes = $this->ClientesModel->find($id);
        if(!$clientes){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cliente não existe');
        }

        return $this->twig->render('clientes/form.html.twig', [

            'BaseUrl' => $this->base_url,
            'title' => 'Editar Cliente',
            'clientes' => $clientes,
        ]);
    }

    /**
     * Exclusão de um registro
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
        
        $this->ClientesModel = new ClientesModel;
        $record = $this->ClientesModel->find($id);
        // dd($id);
        if (!$record)
        return $this->response->setStatusCode(404, 'Cliente não existe!');
        
        $this->ClientesModel->delete($id);
        
        return redirect()->to('/clientes');
    }

    /**
     * salva um novo cliente
     *
     * @return void
     */
    public function save(){
        if ($this->request->getMethod() === 'post') {

            $this->ClientesModel = new ClientesModel;
    
            $form = $this->request->getPost();

            $data = [
                'nome' => trim($this->request->getPost('nome')),
                'email' => trim($this->request->getPost('email')),
                'cpf' => trim($this->request->getPost('cpf')),
                'telefone' => trim($this->request->getPost('telefone')),
                'cep' => trim($this->request->getPost('cep')),
                'logradouro' => trim($this->request->getPost('logradouro')),
                'bairro' => trim($this->request->getPost('bairro')),
                'cidade' => trim($this->request->getPost('cidade')),
                'numero' => trim($this->request->getPost('numero')),
            ];

            if (\key_exists('id', $this->request->getPost()))
            $data['id'] = $this->request->getPost('id');
            // dd($data);

            $this->ClientesModel->save($data);

            if (\key_exists('id', $this->request->getPost()))
                $this->session->setFlashdata('success_notice', 'Cliente atualizado com sucesso!');
            else
                $this->session->setFlashdata('success_notice', 'Cliente cadastrado com sucesso!');

            return redirect()->to('/clientes');
        }
    }
}
