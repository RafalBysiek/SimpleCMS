<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\ViewResolver;

class UsersController {

	private $viewResolver;
	private $database;

	public function __construct($viewResolver,
								$database) {
		$this->viewResolver = $viewResolver;
		$this->database = $database;
	}

	public function index() {
		$users = $this->database->selectAll('users');
		return $this->viewResolver->view('users', compact('users'));
	}

	public function store() {
		echo 'You typed ' . $_POST['name'];
		$this->database->insert('users', ['name' => $_POST['name']]);

		// it tells location we want to redirect to
		header('Location: /users');
	}

}