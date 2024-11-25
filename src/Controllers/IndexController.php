<?php

namespace App\Controllers;

class IndexController {
	public function render() : void {
		require PATH_LAYOUTS . "/header.php";

		include PATH_LAYOUTS . "/index/index.php";

		include PATH_LAYOUTS . "/footer.php";
	}
}
