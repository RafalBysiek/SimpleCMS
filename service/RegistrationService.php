<?php

namespace App\Service;

use App\Service\UserValidator;

class RegistrationService {

	private $usersRepository;
	private $user = NULL;
	private $userValidator;

	public function __construct($usersRepository) {
		$this->usersRepository = $usersRepository;
		$this->userValidator = new UserValidator();
	}
	
	public function register($user) {
		$this->user = $user;

		if ($this->userValidator->areDetailsValid($user) && $this->userNotExists()) {
			echo 'here';
			$this->processRegistration();
			return true;	
		} else {
			return false;
		}
	}

	private function userNotExists() {
		$email = $this->user->getEmail();
		return ! $this->usersRepository->userExists($email);
	}

	public function processRegistration() {
		$this->usersRepository->insertNewUser($this->user);
	}

}