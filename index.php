<?php
//Configuration for php server
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//Make constants using define
define('clientID', '1b8fcbe153974004a81c309f30b0ce7e');
define('clientSecret', 'a57bdce245ec46968dae96eb7f481a8f');
define('redirectURI', 'http://localhost/dchoco/index.php');
define('ImageDirectory', 'pics/');

function connectToInstagram($url) {
	$ch = curl_init();

	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 2,
	));
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function getUserID($userName) {
	$url = 'https://api.instagram.com/v1/users/search?q='.$userName.'&cliend_id='.clientID;
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	return $results['data'][0]['id'];
}

function printImages($userID) {
	$url = 'https://api.instagram.com/v1/users/'.$userId.'/media/recent?client_id='.clientID.'&count=5';
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);
	foreach ($results['data'] as $items) {
		$image_url = $items['images']['low_resolution']['url'];
		echo '<img src" '.$image_url.' "/><br/>';
		savePictures($image_url);

	}
}
function savePictures($image_url){
	echo $image_url . '<br>';
	$filename = basename($image_url);
	echo $filename . '</br>';

	$destination = ImageDirectory . $filename;
	file_put_contents($destination, file_get_contents($image_url));
}


if (isset($_GET['code'])){

	$code = $_GET['code'];
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token_settings = array('client_id' => clientID,
									'clientSecret' => clientSecret,
									'grant_type' => 'authorization_code',
									'redirect_uri' => redirectURI,
									'code' => $code
									);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_settings);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 


$result = curl_exec($curl);
curl_close($curl);

$results = json_decode($result, true);

$userName = $results['user']['username'];

$userID = getUserID($userName);

printImages($userID);
}
else {


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
	<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">Login Scrub</a>
		<script type="js/main.js"></script>
	</body>
</html>


<?php

//meh

 ?>