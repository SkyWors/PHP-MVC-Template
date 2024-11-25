<?php

require $_SERVER["DOCUMENT_ROOT"] . "/../configs/index.php";

$uri = strtok(string: $_SERVER["REQUEST_URI"], token: "?");
$router->render(url: $uri);
