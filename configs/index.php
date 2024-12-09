<?php

use Dotenv\Dotenv;
use App\Models\Repositories\ErrorRepository;
use App\Models\Entities\Database;
use App\Models\Repositories\DatabaseRepository;

// Paths
define(constant_name: "BASE_DIR", value: __DIR__ . "/..");

define(constant_name: "PATH_LAYOUTS", value: BASE_DIR . "/src/views/layouts");
define(constant_name: "PATH_COMPONENTS", value: BASE_DIR . "/src/views/components");
define(constant_name: "PATH_PUBLIC", value: BASE_DIR . "/public");

// Composer
require BASE_DIR . "/vendor/autoload.php";

// Configurations
session_start();
date_default_timezone_set(timezoneId: "Europe/Paris");
$dotenv = Dotenv::createImmutable(paths: BASE_DIR)->load();
define(constant_name: "APP_NAME", value: $_ENV["APP_NAME"]);

if (!isset($_COOKIE["LANG"])) {
	setcookie("LANG", $_ENV["DEFAULT_LANG"], time()+60*60*24*30);
} else {
	setcookie("LANG", $_COOKIE["LANG"], time()+60*60*24*30);
}

// Errors
if ($_ENV["DEBUG"] == 1) {
	ini_set(option: "display_errors", value: 1);
	ini_set(option: "display_startup_errors", value: 1);
	error_reporting(error_level: E_ALL);
} else {
	set_error_handler(callback: function($severity, $message, $file, $line) : void {
		throw new ErrorException(message: $message, code: 0, severity: $severity, filename: $file, line: $line);
	});
	set_exception_handler(callback: [ErrorRepository::class, "handle"]);
	register_shutdown_function(callback: [ErrorRepository::class, "shutdown"]);
}

//Database
$database = new Database(hostname: $_ENV["DATABASE_HOST"], port: $_ENV["DATABASE_PORT"], dbname: $_ENV["DATABASE_NAME"], username: $_ENV["DATABASE_USER"], password: $_ENV["DATABASE_PASSWORD"], driver: $_ENV["DATABASE_DRIVER"], charset: $_ENV["DATABASE_CHARSET"]);
$databaseRepo = new DatabaseRepository(database: $database);
$databaseRepo->createConnection();
define(constant_name: "DATABASE", value: $databaseRepo->getConnection());

// Routes
require BASE_DIR . "/src/routes/index.php";
