<?php

namespace App\Core;

class ViewResolver {

	private $prefix;
	private $postfix;

	public function  __construct(string $prefix, string $postfix) {
		$this->prefix = $prefix;
		$this->postfix = $postfix;
	}

	public function view(string $viewName, $data = []) {
		extract($data);
		return require $this->prefix . $viewName . $this->postfix;
	}

	public function redirect($path) {
		header("Location: /{$path}");
	}
}