<?php

namespace App\Controllers;

use App\Core\ViewResolver;
use App\Service\LoginService;
use App\Dto\User;
use App\Repository\UsersRepositoryImpl;

class LoginController {

	private $viewResolver;
	private $loginService;

	/* takes instance of ViewResolver and QueryBuilder */
	/* póki co skomplikowane, bo wysyłany jest QueryBuilder do controllerów w klasie Router w metodzie callAction(),
	   a ze zrobiłem inny dostęp do bazy danych (za pomocą UsersRepositoryImpl), to potrzebuję PDO które jest już stworzone
	   w QueryBuilderze, więc dopisałem metodę getPDO, która go po prostu tworzy i mogę robić nowy obiekt bez tworzenia PDO jeszcze raz. */
	public function __construct($viewResolver,
								$queryBuilder) {
		$this->viewResolver = $viewResolver;
		$pdo = $queryBuilder->getPDO();
		$this->loginService = new LoginService(new UsersRepositoryImpl($pdo));
	}

	/* redirects to the login_view.php */
	public function showLogin() {
		return $this->viewResolver->view('page_signin');
	}

	/* gathers details about email and password from POST superglobal variable, then sends these to LoginService which takes care of login process*/
	public function processLogin() {		
		$email = $_POST['email'];
		$password = $_POST['password'];
		$user = new User(strip_tags($email), strip_tags($password));

		if ($this->loginService->login($user)) {
			return $this->viewResolver->view('add_company');
		} else {
			return $this->viewResolver->view('login', compact('email'));
		};
	}

	public function logout() {
		$this->loginService->logout();
		$this->viewResolver->view('index');
	}
}