<?php

namespace App\Dto;

class Company {
	
	private $email;
	private $password;

	public function __construct($name, $address, $city, $country, $nip, $email) {
		$this->name =$name;
		$this->address = $address;
		$this->city = $city;
		$this->country = $country;
		$this->nip = $nip;
		$this->email = $email;
	}

	public function getName() {
		return (string)$this->name;
	}

	public function setName(string $name) {
		$this->name = $name;
	}

	public function getAddress() {
		return $this->address;
	}

	public function setAddress(string $address) {
		$this->address = $address;
	}
	public function getCity() {
		return $this->city;
	}

	public function setCity(string $city) {
		$this->city = $city;
	}
	public function getCountry() {
		return $this->cuntry;
	}

	public function setCountry(string $cuntry) {
		$this->cuntry = $cuntry;
	}
	public function getNip() {
		return $this->nip;
	}

	public function setNip(string $nip) {
		$this->nip = $nip;
	}
	public function getEmail() {
		return $this->email;
	}

	public function setEmail(string $email) {
		$this->email = $email;
	}
}