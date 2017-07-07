<?php

namespace App\Repository;

use App\Dto\User;

class UsersRepositoryImpl implements UsersRepository {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function isUserRegistered($user) {
		$email = $user->getEmail();
		$query = "SELECT * FROM users WHERE email='{$email}';";

		return $this->query($query) != 0;
	}

	public function validateEmailAndPassword($user) {
		$email = $user->getEmail();
		$password = $user->getPassword();
		$query = "SELECT * FROM users 
				  WHERE email='{$email}' AND password='{$password}';";

		return $this->query($query) != 0;
	}

	private function query($query) {
		try {
			return $this->pdo->query($query);			
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
}