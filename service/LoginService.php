<?php

namespace App\Service;

/* Class responsible for Logging User  */

class LoginService {

	private $queryBuilder;
	private $user = NULL;

	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
	}

	public function login($user) {
		$this->user = $user; 
		$detailsValid = $this->areDetailsValid();

		if ($detailsValid) {
			$this->compareToRegisteredUsers();
			return $this->loginSuccessful();
		} else {
			return $this->loginFailed();
		}
	}

	private function areDetailsValid() {
		$emailValid = $this->isEmailValid();
		$passwordValid = $this->isPasswordValid();

		return $emailValid && $passwordValid;
	}

	private function isEmailValid() {
		$email = $this->user->getEmail();
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;
		}
	}

	private function isPasswordValid() {
		$password = $this->user->getPassword();
		if (! isset($password)) {
			return false;
		}

		if ($this->password === '') {
			return false;
		}
		return true;
	}

// TODO
	private function compareToRegisteredUsers() {

	}

	public function loginSuccessful() {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: /");
	}

	public function loginFailed() {
		header("Location: /login");
	}
} 