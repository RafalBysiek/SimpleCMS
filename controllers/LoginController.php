<?php

namespace App\Controllers;

class LoginController {

	private $viewResolver;

	public function __construct($viewResolver,
								$database) {
		$this->viewResolver = $viewResolver;
	}

	public function login() {
		return $this->viewResolver->view('login');
	}
}