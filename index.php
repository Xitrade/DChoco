<?php
//Configuration for php server
set_time_limit(0);
ini_set('default_socket_timeout', 9000);
session_start();

//Make constants using define
define('clientID', 'c73d173254d844b89117954f97d9ee');
define('clientSecret', '971766cd8c4f4af7b7a6ff36f32b68b0');
define('redirectURI', 'http://localhost/dchoco/index.php');
define('ImageDirectory', 'pics/');

if (isset($_GET['code'])){

	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/ouath/access_token';
	$access_token_settings = array('client_id' => clientID,
									'clientSecret' => clientSecret,
									'grant_type' => 'authorization_code',
									'redirect_uri' => redirectURI,
									'code' => $code
									);
}



?>

<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Chocolate Scrub</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="author" href="humans.txt">
	</head>
	<body>
	<a href="https://api.instagram.com/ouath/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login Scrub</a>
		<script type="js/main.js"></script>
	</body>
</html>

