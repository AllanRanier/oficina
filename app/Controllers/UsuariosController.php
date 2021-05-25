<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TipoUsuarioModel;

class UsuariosController extends BaseController
{
    protected $tipoUsuarioModel;       

    public function __construct(){
        $this->tipoUsuarioModel = new TipoUsuarioModel;
    }
	public function index()
	{
		// $Users = $this->UserModel->findAll();

		return $this->twig->render("usuarios/index.html.twig",[
			'title' => 'Usuários',
			// 'usuarios' => $Users,
		]);
	}

	public function create()
    {

        $tipo_usuarios = $this->tipoUsuarioModel->findall();
        $base_url = '/usuario';   

        return $this->twig->render('usuarios/form.html.twig', [
            'title' => 'Adicionar novo Usuario',
            'tiposUsuarios' => $tipo_usuarios,
            'base_url' => $base_url
        ]);
    }

    public function save(){
        if ($this->request->getMethod() === 'post') {
    
            $form = $this->request->getPost();

            $data = [
                'nome' => trim($this->request->getPost('nome')),
                'email' => trim($this->request->getPost('email')),
            ];

            if($this->request->getPost('senha')){
                $senha = password_hash(trim($this->request->getPost('senha')), PASSWORD_DEFAULT);
                $data['senha'] = $senha;
            }

            if (\key_exists('id', $this->request->getPost()))
                $data['id'] = $this->request->getPost('id');

            dd($data);

            $this->UsuarioModel->save($data);

            if (\key_exists('id', $this->request->getPost()))
                $this->session->setFlashdata('success_notice', 'Usuario atualizado com sucesso!');
            else
                $this->session->setFlashdata('success_notice', 'Usuario cadastrado com sucesso!');

            return redirect()->to('/usuario');
        }
    }
}
