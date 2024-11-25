<h1>Index</h1>
<?php
	use App\Utils\Lang;

	$temp = "Test";
	echo Lang::translate("NAME", ["name" => $temp, "surname" => "Test"]);
?>
