<?php
if(isset($_GET['login'])) {
	login_errors();
}

if(isset($_GET['register'])) {
	register_errors();
}


function login_errors(){
	clearErrors();
	$email = $_REQUEST['email']; 
	$pass = $_REQUEST['password'];
	if(!findEmail($email)){
		setError("Email not found");
		return;
	}
		setError("Password incorrect");
		return;
	}
	else{
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
		setError("Name can not be blank!");
		return;
	}

	if(findEmail($email)){
		setError("Email already taken");
		return;
	}

	if($pass != $rpass){		setError("Passwords do not match!");
		return;
	}

	if(empty($errors)){
		if(addNewUser($name,$email,$pass)){
			logInUser($email);
			header('Location: profile.php');
		}
		else{
			setError("Error occured during register");
			return;
		}
	}
}

?>