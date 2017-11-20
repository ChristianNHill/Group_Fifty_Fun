<?php
$errors = array();
if(isset($_GET['login'])) {
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password']; 
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(mysqli_connect_errno()){
		$errors[] = "Failed to connect to the database";
		exit;
	}

	if(!validate_email($email, $connection)){
		$errors[] = "Email not found";
		exit;
	}
	if(!validate_credentials($email, $pass, $connection)){
		$errors[] = "Password incorrect";
	}
	else{
		$user = new User($email,$connection);
		$user->log_in();
		header('Location: profile.php');
	}
}
?>