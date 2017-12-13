<?php
/*
This entire file is a handler so anyone that enters an invalid url will redirect to here by default.
This file then determines if the url just needs the .php extension or if the url is not 
a file in the directory in which it will display an error. This page also handles incorrect urls
and displays a message
*/


function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}

$app_length = strlen("aqueous-coast-49377.herokuapp.com") + 3;

$url =  "//{$_SERVER['https_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );

/* 
Redirects to home page if the actual index page is trying to be reached
The $length<=17 is for local server testing purposes
*/
if($length == $app_length or $length<=17){	
	header('Location: home.php');
}
else if (!endsWith($escaped_url,".php")){
	$test_url = $_SERVER['REQUEST_URI'].".php";
	$test_url = substr($test_url, 1);
	if(file_exists($test_url)){
		header('Location: '.$test_url);
	}
	else if(strpos($test_url, ".") > 0){
		echo file_get_contents("404.php");
		echo "Invalid url";
	}
	else{
		echo file_get_contents("404.php");
	}
}
else{
	echo file_get_contents("404.php");
}
?>
