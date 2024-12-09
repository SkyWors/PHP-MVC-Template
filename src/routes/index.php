<?php

use App\Router;

$router = new Router;

$routePath = "App\Controllers\\";

$router->add(url: "", path: $routePath . "IndexController");
$router->add(url: "/error", path: $routePath . "ErrorController", title: APP_NAME . " - Erreur");

$router->add(url: "/api", path: $routePath . "API\APIController", title: APP_NAME . " - API");
$router->add(url: "/api/users", path: $routePath . "API\APIUsersController", title: APP_NAME . " - API");
