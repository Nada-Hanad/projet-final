<?php


if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'tdw_php');
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'root');
	define('DBPASS', 'root');
	define('DBDRIVER', '');

	define('PROJECT_ROOT', 'http://localhost/Projet_Final');
	define('ROOT', PROJECT_ROOT . '/public');
	define('ADMINROOT', PROJECT_ROOT . '/admin');
} else {
	/** database config **/
	define('DBNAME', 'tdw_php');
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'root');
	define('DBPASS', 'root');
	define('DBDRIVER', '');

	define('ROOT', '');
}

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
