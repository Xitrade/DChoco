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

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<a href="https:api.instagram/ouath/authorize/?client_id=<<?php echo client_ID; ?>&redirect_uri=<<?php echo redirectURI; ?>>&response_type=code">Login Scrub</a>
		<script type="js/main.js"></script>
	</body>
</html>
