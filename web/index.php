<?php

function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}

$app_length = strlen("aqueous-coast-49377.herokuapp.com");
$app_length = $app_length + 3;

$url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
$length = strlen($escaped_url);
//echo $app_length."</br>";
//echo $length;
if($length == $app_length){	
	header('Location: index.html');
}
else if (!endsWith($escaped_url,".html")){
	$test_url = $_SERVER['REQUEST_URI'].".html";
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
