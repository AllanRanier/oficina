<?php

namespace App\Controllers;


class AuthController extends BaseController
{
    

    public function __construct(){
        
    }
	public function index()
	{

		return $this->twig->render("auth/index.html.twig");
	}
}
