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

		if ($this->areDetailsValid() && $this->isUserRegistered()) {
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

	private function isUserRegistered() {
		return $this->usersRepository->validateUser($this->user);
	}

	private function processLogging() {
		session_start();
		//$_SESSION['username'] = $_POST['username'];
	}

	private function logout() {
		session_start();
		session_destroy();
		//$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
	}
} 