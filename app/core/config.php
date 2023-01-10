<?php


if ($_SERVER['SERVER_NAME'] == 'localhost') {
	/** database config **/
	define('DBNAME', 'test');
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'root');
	define('DBPASS', 'root');
	define('DBDRIVER', '');

	define('ROOT', 'http://localhost/Projet_Final/public');
} else {
	/** database config **/
	define('DBNAME', 'we_cook');
	define('DBHOST', '127.0.0.1');
	define('DBUSER', 'root');
	define('DBPASS', 'root');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');
}

define('APP_NAME', "My Webiste");
define('APP_DESC', "Best website on the planet");

/** true means show errors **/
define('DEBUG', true);
