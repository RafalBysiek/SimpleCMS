<?php

namespace App\Service;

/* Class responsible for Logging User  */

class LoginService {

	private $usersRepository;
	private $user = NULL;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
	}

	public function login($user) {
		$this->user = $user; 

		if ($this->areDetailsValid() && $this->validateUser()) {
			$this->processLogging();		
			return true;	
		} else {
			return false;
		}
	}

	private function areDetailsValid() {
		$emailValid = $this->isEmailValid();
		$passwordValid = $this->isPasswordValid();

		return $emailValid && $passwordValid;
	}

	private function isEmailValid() {
		$email = $this->user->getEmail();
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return true;
		} else {
			return false;
		}
	}

	private function isPasswordValid() {
		$password = $this->user->getPassword();
		$passwordSet = isset($password);
		$passwordEmpty = $password === '';

		return $passwordSet && (! $passwordEmpty);
	}

	private function validateUser() {
		return $this->usersRepository->validateUser($this->user);
	}

	private function processLogging() {
		session_start();
		$_SESSION['email'] = $_POST['email'];
	}

	public function logout() {
		session_start();
		unset($_SESSION['email']);
		session_destroy();
		//$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	}
} 