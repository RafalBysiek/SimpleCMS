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
		$company = $this->database->selectAll('company');
		return $this->viewResolver->view('company', compact('company'));
	}



}