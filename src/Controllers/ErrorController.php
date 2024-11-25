<?php

namespace App\Controllers;

class ErrorController {
	public function render(int $errorCode = 500) : void {
		define(constant_name: "ERROR_CODE", value: $errorCode);

		http_response_code(response_code: ERROR_CODE);

		require PATH_LAYOUTS . "/header.php";

		include PATH_LAYOUTS . "/error/error.php";

		include PATH_LAYOUTS . "/footer.php";
	}
}
