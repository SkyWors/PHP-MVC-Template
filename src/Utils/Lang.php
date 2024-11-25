<?php

namespace App\Utils;

class Lang {

	/**
	 * Lang function
	 *
	 * @param string $key
	 * @param array $options
	 *
	 * @return string
	 */
	public static function translate(string $key, array $options = null) : string {
		$file = file_get_contents(BASE_DIR . "/public/langs/" . $_COOKIE["LANG"] . ".json");
		$json = json_decode($file);

		if (isset($json->$key)) {
			$result = $json->$key;
		} else {
			$result = "Missing entry";
		}

		if (isset($options)) {
			foreach ($options as $index => $option) {
				$result = str_replace("$[" . $index . "]", $option, $result);
			}
		}

		return $result;
	}
}
