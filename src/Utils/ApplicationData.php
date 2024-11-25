<?php

namespace App\Utils;

class ApplicationData {

	/**
	 * Return every users
	 *
	 * @param mixed $path
	 *
	 * @return array
	 */
	public static function getUsers() : array {
		$users[1] = [
			"name" => "Lui",
			"surname" => "Labas"
		];
		$users[2] = [
			"name" => "Lautre",
			"surname" => "Ici"
		];

		return $users;
	}
}
