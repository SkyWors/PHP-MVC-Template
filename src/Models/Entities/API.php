<?php

namespace App\Models\Entities;

class API {
	private array $data;

	/**
	 * API construct
	 *
	 * @param array $data
	 */
	public function __construct(array $data) {
		$this->data = $data;
	}

	/**
	 * Return data
	 *
	 * @return array
	 */
	public function getData() : array {
		return $this->data;
	}
}
