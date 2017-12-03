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
	/*
	if(!$connection){
		$errors[] = "Failed to connect to the database";
		exit;
	}
	*/
	if(!findEmail($email)){
		$errors[] = "Email not found";
		exit;
	}
	if(!validate_credentials($email, $pass)){
		$errors[] = "Password incorrect";
	}
	else{
		//$user = new User($email);
		//$user->logIn();
		logInUser($email);
		header('Location: profile.php');
	}
}

function register_errors(){
	$name = $_REQUEST['name']; 
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password']; 
	$rpass = $_REQUEST['rpassword']; 

	if(strlen(trim($name))==0){
		$errors[] = 'Name can not be blank!';
		exit;
	}

	if(findEmail($email)){
		$errors[] = "Email already taken";
		exit;
	}

	if($pass != $rpass){
		$errors[] = 'Passwords do not match!';
	}

	if(empty($errors)){
		if(addNewUser($name,$email,$pass)){
			logInUser($email);
			header('Location: profile.php');
		}
		else{
			$errors[] = 'Error occured during register';
		}
	}
}

?>