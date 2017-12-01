<?php
$errors = array();

if(isset($_GET['login'])) {
	login_errors();
}

if(isset($_GET['register'])) {
	register_errors();
}


function login_errors(){
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password']; 
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(!$connection){
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
	mysqli_close($connection);
}

function register_errors(){
	$name = $_REQUEST['name']; 
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password']; 
	$rpass = $_REQUEST['rpassword']; 

	$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(!$connection){
		$errors[] = "Failed to connect to the database";
		exit;
	}

	if(strlen(trim($name))==0){
		$errors[] = 'Name can not be blank!';
	}

	if(validate_email($email, $connection)){
		$errors[] = "Email already taken";
		exit;
	}

	if($pass != $rpass){
		$errors[] = 'Passwords do not match!';
	}
	mysqli_close($connection);

	if(empty($errors)){
		$user = new User($name,$email,$pass);
		$user->addNewUser($connection);
		$user->log_in();
		header('Location: profile.php');
	}
}

?>