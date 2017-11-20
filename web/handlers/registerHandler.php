<?php
$errors = array();


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

require 'user.php';	
require '../config.php';
// Obtain a connection object by connecting to the db

$connection = mysqli_connect(HOST, USER,PASS, DB);
if(mysqli_connect_errno()){
	$errors[] = "Failed to connect to the database";
}

if(validate_email($email, $connection)){
	$errors[] = "Email already taken";
}

if(empty($errors) and strlen($name)>0){
	$user = new User($name,$email,$pass);
	$user->addNewUser($connection);
	$_SESSION["name"] = $user->getName();
	$_SESSION["email"] = $user->getEmail();
	$_SESSION["logged_in"] = True;
	header('Location: profile.php');
}

/*
$insert_query = "INSERT into store (id, name, qty, price) values ('$Id', '$Name', '$Quantity', '$Price')";

$insert_row =  mysqli_query($connection,$insert_query);  // Run the INSERT query.

if($insert_row){
print 'Row Inserted !' .'<br />'; 
include 'store.php'; 
}else{
    echo "<br>ERROR: Could not execute sql. Error code = " . mysqli_error($connection)."<br>";
	die('Error on insert');
}
*/
?>