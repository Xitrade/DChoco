<?php
//Configuration for php server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//Make constants using define
define('client_ID', '1b8fcbe153974004a81c309f30b0ce7e');
define('client_Secret', 'a57bdce245ec46968dae96eb7f481a8f');
define('redirectURI', 'http://localhost/dchoco/index.php');
define('ImageDirectory', 'pics/');

?>


<!--CLIENT ID		1b8fcbe153974004a81c309f30b0ce7e
	CLIENT SECRET	a57bdce245ec46968dae96eb7f481a8f
	WEBSITE URL		http://localhost/dchoco/index.php
	REDIRECT URI	http://localhost/dchoco/index.php -->