<?php

class QueryBuilder {

	private $pdo;

	public function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function selectAll($table) {
		$statement = $this->pdo->prepare("select * from {$table};");

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_CLASS);
	}
//add new user to tthe users database 
	public function insert($login, $email, $password) {
		$sql = sprintf(
			'insert into users (login, email, password) values (%s, %s, %s);',
			$login, $email, $password
		);
	public function insert($email, $password) {
		$sql = sprintf(
			'insert into users (login, email, password) values (%s, %s, %s);',
			$email, $email, $password
		);

		try {
			var_dump($pdo);
			$statement = $this->pdo->prepare($sql);
			$statement->execute($parameters);
		} catch(PDOException $e) {
			die('Whoops, something went wrong');
		}

		/*
		array_map(function($param) {
			return ":{$param}";
		}, array_keys($parameters));
		*/
	}
}