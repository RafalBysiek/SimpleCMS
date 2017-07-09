<?php

namespace App\Repository;

use App\Dto\User;

class UsersRepositoryImpl implements UsersRepository {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function validateUser($user) {
		$email = $user->getEmail();
		$password = $user->getPassword();
		$queryString = "SELECT COUNT(*) FROM users 
				  WHERE email='{$email}' AND password='{$password}';";

		$numberOfRows = $this->query($queryString);
		return (int)$numberOfRows != 0;
	}

	private function query($queryString) {
		try {
			$result = $this->pdo->prepare($queryString); 
			$result->execute();			
			return $result->fetchColumn(0);			
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
}