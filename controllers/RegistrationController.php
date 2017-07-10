<?php

class RegistrationController {

	private $viewResolver;
	private $loginService;

	public function __construct() {

	}

	// shows view responsible for registration
	public function showRegistration() {
		return $this->viewResolver->view('page_signin');
	}

	// TODO
	public function processRegistration() {

	}
}