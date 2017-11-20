<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
//require($_SERVER['DOCUMENT_ROOT']."/views/nav.php"); 
require "views/nav.php";
?>
<?php

if(logged_in()){
	?>
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1><?php
}
else{
	?><h1>You are not logged in!</h1>
	<a href="login.php">Login here!</a><?php
}
?>
</body>
</html>
