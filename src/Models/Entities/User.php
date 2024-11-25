<?php

namespace App\Models\Entities;

class User {
	private string $name;

	function __construct(string $name) {
		$this->name = $name;
	}

	public function getName() : string {
		return $this->name;
	}

	public function setName($name) : void {
		$this->name = $name;
	}
}
