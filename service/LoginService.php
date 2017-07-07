<?php

namespace App\Service;

/* Class responsible for Logging User  */

class LoginService {

	private $queryBuilder;
	private $email;
	private $password;

	public function __construct($queryBuilder) {
		$this->queryBuilder = $queryBuilder;
		$this->email = '';
		$this->password = '';
	}

	public function login(string $email, string $password) {
		$this->email = $email;
		$this->password = $password;
		if ($this->areDetailsValid()) {
			$this->loginSuccessful();
		} else {
			$this->loginFailed();
		}
	}

	private function areDetailsValid() {
		$emailValid = $this->isEmailValid();
		$passwordValid = $this->isPasswordValid();

		return $emailValid && $passwordValid;
	}

	private function isEmailValid() {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;
		}
	}


} 