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
		$passwordSet = isset($password);
		$passwordEmpty = $password === '';

		return $passwordSet && (! $passwordEmpty);
	}

	private function isUserRegistered() {
		return $this->usersRepository->isUserRegistered($this->user);
	}

	public function loginSuccessful() {
		session_start();
		$_SESSION['username'] = $_POST['username'];
		header("Location: /add_company");
		//require 'Add_company.php';
	}

	public function loginFailed() {
		header("Location: /login");
	}

	public function logout() {

	}
} 