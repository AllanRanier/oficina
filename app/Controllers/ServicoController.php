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

    /**
     * Chama a view para cadastro de um novo servico
     *
     * @return void
     */
	public function create()
    {   
        $servicos = $this->ServicoModel->findAll();
        $base_url = '/servicos';   
        return $this->twig->render('servico/form.html.twig', [
            'title' => 'Adicionar novo Serviço',
            'servico' => $servicos,         
            'baseRoute' => $base_url
        ]);
    }

    public function update(string $id){
        $servicos = $this->ServicoModel->find($id);
        $base_url = '/servicos'; 
        
        if(!$servicos){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Serviços não existe');
        }

        return $this->twig->render('servico/form.html.twig', [
            'baseRoute' => $base_url,
            'servico' => $servicos,         
            'title' => 'Editar Serviços',
        ]);
    }


    public function delete($id){    
        $record = $this->ServicoModel->find($id);
        
        if (!$record)
        return $this->response->setStatusCode(404, 'Cliente não existe!');
        
        $this->ServicoModel->delete($id);
        
        return redirect()->to('/servicos');
    }

    /**
     * salva um novo servico
     *
     * @return void
     */

    public function save(){
        if ($this->request->getMethod() === 'post') {
    
            $form = $this->request->getPost();

            $data = [
                'nome' => trim($this->request->getPost('nome')),
            ];
            // dd($data);


            if (\key_exists('id', $this->request->getPost()))
                $data['id'] = $this->request->getPost('id');

            

            $this->ServicoModel->save($data);

            if (\key_exists('id', $this->request->getPost()))
                $this->session->setFlashdata('success_notice', 'Servico atualizado com sucesso!');
            else
                $this->session->setFlashdata('success_notice', 'Servico cadastrado com sucesso!');

            return redirect()->to('/servicos');
        }
    }
}
