<?php

namespace App\Controllers;

use App\Core\ViewResolver;

use App\Service\LoginService;

class LoginController {

	private $viewResolver;
	private $loginService;

	public function __construct($viewResolver,
								$database) {
		$this->viewResolver = $viewResolver;
		$this->loginService = new LoginService($database);
	}

	public function showLogin() {
		return $this->viewResolver->view('login');
	}

	public function processLogin() {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$this->loginService->login(strip_tags($email), strip_tags($password));

		//return $this->viewResolver->view('contact');
	}
}