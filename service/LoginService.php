<?php

namespace App\Service;

/* Class responsible for Logging User  */

class LoginService {

	private $queryBuilder;
	private $email;
	private $password;

	public function __construct($queryBuilder,
								string $email,
								strin $password) {
		$this->queryBuilder = $queryBuilder;
		$this->email = $email;
		$this->password = $password;
	}

	public function login(string $email, string $password) {
		if ($this->areDetailsValid()) {
			$this->loginSuccessful();
		} else {
			$this->loginFailed();
		}
	}

	private function areDetailsValid() {
		$emailValid = $this->isEmailValid();
		$passwordValid = $this->isPasswordValid();

		retrun $emailValid && $passwordValid;
	}

	private function isEmailValid() {
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format";
		}
	}
} 