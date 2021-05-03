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
}
