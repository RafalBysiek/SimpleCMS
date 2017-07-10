<?php

namespace App\Service;

/* Class responsible for Logging User  */

class LoginService {

	private $usersRepository;
	private $user = NULL;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
	}

	/* responsible for login user, as a parameter taeks User object 
	   1. checks if details submitted to user (email and password) are not empty and filters email,
	   2. validate user using UsersRepository, chcecks if user sign correct email and password
	   3. if validatation is correct, process logging (starting session and set User to $_SESSION variable) and returns true
	   4. if validation is incorrect, returns false
	*/
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
		$this->fillUserWithDetails();
		$this->createSession();
	}

	/* only email and password are submitted, so the rest of User object is filled from database */
	private function fillUserWithDetails() {
		$email = $this->user->getEmail();
		$this->user = $this->usersRepository->getUser($email);
	}

	private function createSession() {
		session_start();
		$_SESSION['user'] = $this->user;
	}

	/* function destroys session and unsets $_SESSION variables */
	public function logout() {
		session_start();
		unset($_SESSION['email']);
		session_destroy();
	}
} 