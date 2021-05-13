<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    

    public function __construct(){
        
    }
	public function index()
	{

		return $this->twig->render("auth/index.html.twig");
	}
}
