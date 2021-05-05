<?php

namespace App\Controllers;

use App\Models\UserModel;

class Usuarios extends BaseController
{
    protected $UserModel;

    public function __construct(){
        $this->UserModel = new UserModel();
    }
	public function index()
	{
		$Users = $this->UserModel->findAll();

		return $this->twig->render("usuarios/index.html.twig",[
			'title' => 'Usuários',
			'usuarios' => $Users,
		]);
	}

	public function edit($user_id = NULL){
		if (!$user_id || !$this->IonAuth->user($user_id)->row()) {
			exit('Usuario não existe');
		}else{
			$data = array(
				'titulo' => 'Editar Usuário',
				'usuario' => $this->IonAuth->user($user_id)->row()
			);
		}

		dd($data['usuario']); 
	}
}
