<?php include "views/nav.php"; ?>
<?php

require "user.php";

if($_SESSION["logged_in"]){
	?>
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1><?php
}
else{
	?><h1>You are not logged in!</h1>
	<a href="login.php">Login here!</a><?php
}
?>