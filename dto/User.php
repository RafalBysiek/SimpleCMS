<?php

namespace App\Dto;

class User {
	private $email;
	private $password;

	public function __construct($email, $password) {
		$this->email = $email;
		$this->password = $password;
	}

	public function getEmail() {
		return (string)$this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword(string $password) {
		$this->password = $password;
	}
}