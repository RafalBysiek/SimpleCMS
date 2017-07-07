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
		$query = "SELECT email
				  FROM simplecms
				  WHERE email = $email;";

		try {
			$statement = $this->pdo->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll();
			if (empty($result)) {
				return false;
			} else {
				return true;
			}
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}
}