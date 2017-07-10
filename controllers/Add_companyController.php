<?php

namespace App\Controllers;

use App\Core\App;

use App\Core\ViewResolver;

class Add_companyController {
	private $viewResolver;
	private $database;
		public function __construct($viewResolver,
								$database) {
			$this->viewResolver = $viewResolver;
			$pdo = $queryBuilder->getPDO();

			}
	private function AddingCompany{
		$name = $_POST['name_company'];	
		$address = $_POST['address_company'];
		$country = $_POST['country_company'];
		$street = $_POST['street_company'];
		$city = $_POST['city_company'];
		$email = $_POST['email_company'];
		$nip = $_POST['NIP_company'];

		$user = new Company(
			strip_tags($name),
			strip_tags($address),
			strip_tags($street),
			strip_tags($city),
			strip_tags($nip),
			strip_tags($email)
			);

		if ($this->loginService->login($user)) {
			return $this->viewResolver->view('add_company');
		} else {
			return $this->viewResolver->view('login', compact('email'));
		};
	}



}






