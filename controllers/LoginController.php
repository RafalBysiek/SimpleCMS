<?php

namespace App\Controllers;

use App\Service\LoginService;

class LoginController {

	private $viewResolver;
	private $loginService;

	public function __construct($viewResolver,
								$database) {
		$this->viewResolver = $viewResolver;
		$this->lognService = new LoginService($database);
	}

	public function showLogin() {
		return $this->viewResolver->view('login');
	}

	public function processLogin() {
		$email = $_POST['login'];
		$password = $_POST['password'];
		$loginService->login($email, $password);
	}
}