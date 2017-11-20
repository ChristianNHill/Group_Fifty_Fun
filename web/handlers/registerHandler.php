<?php
$errors = array();
if(isset($_GET['register'])) {
	$name = $_REQUEST['name']; 
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password']; 
	$rpass = $_REQUEST['rpassword']; 

	if(strlen($name)>0 and strlen(trim($name))==0){
		$errors[] = 'Name can not be blank!';
	}

	if($pass != $rpass){
		$errors[] = 'Passwords do not match!';
	}

	$connection = connect();
	if(!$connection){
		$errors[] = "Failed to connect to the database";
	}

	if(validate_email($email, $connection)){
		$errors[] = "Email already taken";
	}

	if(empty($errors) and strlen($name)>0){
		$user = new User($name,$email,$pass);
		$user->addNewUser($connection);
		$user->log_in();
		header('Location: profile.php');
	}
}
?>