<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Service\LoginService;
use App\Dto\User;

class LoginController {

	private $viewResolver;
	private $loginService;

	public function __construct($viewResolver,
								$database) {
		$this->viewResolver = $viewResolver;
		$pdo = $database->getPDO();
		$this->loginService = new LoginService(new UsersRepository($pdo));
	}

	public function showLogin() {
		return $this->viewResolver->view('login');
	}

	public function processLogin() {		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user = new User(strip_tags($email), strip_tags($password));
		$this->loginService->login($user);

		return $this->viewResolver->view('contact');
	}
}