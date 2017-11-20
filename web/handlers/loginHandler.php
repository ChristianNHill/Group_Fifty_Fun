<?php
$errors = array();

$email = $_REQUEST['email']; 
$pass = $_REQUEST['password']; 

require 'user.php';	
require '../config.php';
// Obtain a connection object by connecting to the db
//echo "something";
$connection = mysqli_connect(HOST, USER,PASS, DB);
if(mysqli_connect_errno()){
	$errors[] = "Failed to connect to the database";
}

$temp = validate_email($email, $connection);

//echo "Temp: ".$temp;
if(!empty($email) and !empty($pass)){
	if(!validate_email($email, $connection)){
		$errors[] = "Email not found";
	}
	if(!validate_credentials($email, $pass, $connection)){
		$errors[] = "Password incorrect";
	}
	else{
		$user = new User($email,$connection);
		//session_start();
		//setcookie('name', $user->getName(), time() + 900);
		$_SESSION["name"] = $user->getName();
		$_SESSION["email"] = $user->getEmail();
		$_SESSION["logged_in"] = True;
		//print_r($_SESSION);
		//session_destroy();
		header('Location: profile.php');
	}
}

//echo $_SESSION["logged_in"];