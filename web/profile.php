<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require "user.php";
require "views/nav.php";
?>
<?php

if(logged_in()){
	?>
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1><?php
	if(isset($_SESSION["school_id"])){
		echo "school is = ".$_SESSION["school_id"];
	}

}
else{
	?><h1>You are not logged in!</h1>
	<a href="login.php">Login here!</a><?php
}
?>
</body>
</html>
