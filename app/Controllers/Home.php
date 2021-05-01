<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __contruct(){

	}

	public function index()
	{
		return $this->twig->render("home/index.html.twig");
	}
}
