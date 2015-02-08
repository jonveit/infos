<?php

$version = "local";

switch($version) {
	case "local":
		define('DB_TYPE', 'mysql');
		define('DB_HOST', 'localhost');
		define('DB_PORT', '8889');
		define('DB_NAME', 'infos');
		define('DB_USER', 'admin');
		define('DB_PASS', 'asd90123');
		break;
	case "remote":
		define('DB_TYPE', 'mysql');
		define('DB_HOST', 'localhost');
		define('DB_PORT', '3306');
		define('DB_NAME', 'jonveit1_infos');
		define('DB_USER', 'jonveit1_jon');
		define('DB_PASS', 'asd90123');
		break;
}

?>
