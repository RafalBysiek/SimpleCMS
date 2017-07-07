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

		$detailsValid = $this->areDetailsValid();

		if ($detailsValid) {
			compareToRegisteredUsers();

			echo 'details valid';
			$this->loginSuccessful();
		} else {
			echo 'details invalid';
			//$this->loginFailed();
		}
	}

	private function areDetailsValid() {
		$emailValid = $this->isEmailValid();
		$passwordValid = $this->isPasswordValid();

		return $emailValid && $passwordValid;
	}

	private function isEmailValid() {
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			return false;
		} else {
			return true;
		}
	}
 	// TODO
	private function isPasswordValid() {
		if (! isset($this->password)) {
			return false;
		}

		if ($this->password === '') {
			return false;
		}
		return true;
	}

	private function compareToRegisteredUsers() {

	}

	public function loginSuccessful() {

	}
} 