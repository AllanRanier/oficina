<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
	public function __contruct(){

	}

	public function index()
	{
		return $this->twig->render("Dashboard/index.html.twig",[
			'title' => 'DashBoard'
		]);
	}
}
