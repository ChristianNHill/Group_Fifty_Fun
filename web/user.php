<?php
/*
encrypt($password)
Encryps and returns password string

validate_credentials($email, $password)
Returns true if the user with the given email matches the password 

findEmail($email)
Returns true if an email exits in the database

getClass($class_id)
Returns associative array of class variables keys:id, name, department, class_code

updateClassList($user_id)
Updates the class_list session variable given user id

updateSchool($user_id)
Sets session variable school given a user_id

logInUser($id_or_email)
Sets session variables for a user given a users id or email

linkClass($class_id)
Links a class to the user that is logged in

unlinkClass($class_id)
Unlinks a class to the user that is logged in

Query error handler
function query($query)

getArray($result)
Returns an array given the result of a query

clearErrors()
Clears the error variable in the session

printSession()
Just a nice way to print session variables
*/


require($_SERVER['DOCUMENT_ROOT']."/../config.php");
//require '../config.php';

//Adds user to the database
function addNewUser($name, $email, $password){
	$encrypted = encrypt($password);
	if(query("INSERT INTO user (name, email, password) values ('$name', '$email', '$encrypted');")){
		return true;
	}
	else{
		return false;
	}
}

function encrypt($password){
	return md5($password);
}

// Returns true if an email exits in the database
function findEmail($email){
	$result = query("select email from user where email = '$email';");
	$row = getArray($result);
    if(count($row) > 0){
    	return 1;
    }
    else{
    	return False;
    }
}

 
//Returns true if the user with the given email matches the password 
function validate_credentials($email, $password){
	$result = query("select email,password from user where email = '$email';");
	$row = getArray($result);
	if($row[1] == encrypt($password)){
		return True;
	}
	else{
		return False;
	}
}

// Returns associative array of class variables keys:id, name, department, class_code
function getClass($class_id){
	$result = query("select * from class where id=$class_id;");
	$row = getArray($result);
	$class = array("id"=>$row[0], "name"=>$row[2], "department"=>$row[3], "class_code"=>$row[4]);
	return $class;
}

/* 
Allows you to pass multiple variables to a page given the variables are an array
Ex. 
$vars = array('email' => "EMAIL", 'event_id' => "EVENT")
$location = 'profile.php'
will produce a url similar to http://localhost:8000/profile.php?email=EMAIL&event_id=EVENT
*/
function loadPageWith($vars, $loaction){
	$querystring = http_build_query($vars);
	$location = "profile.php";
	$url = 'http://' . $_SERVER['HTTP_HOST']."/".$location."?".$querystring;
	header('Location: '.$url);
}

// Updates the class_list session variable for the current user
function updateClassList(){	
	$user_id = $_SESSION["id"];
	$result = query("select class_id from linker where user_id=$user_id;");
	$class_list = array();
	while($row = getArray($result)){
		array_push($class_list, $row[0]);
	}
	$_SESSION["class_list"] = $class_list;
}

// Sets session variable school for the current user
function updateSchool(){
	$user_id = $_SESSION["id"];
	$result = query("select school_id from user where id=$user_id;");
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$school_id = $row[0];
	if($school_id != NULL){
		$result = query("select * from school where id=$school_id;");
		$row = mysqli_fetch_array($result, MYSQLI_NUM);
		$school = array("id"=>$row[0], "name"=>$row[1]);
		$_SESSION["school"] = $school;
	}
	else{
		if(isset($_SESSION["school"])){
			unset($_SESSION["school"]);
		}
	}
}

// Sets session variables for a user given a users id or email
function logInUser($id_or_email){
    $result = query("select id,name,email,school_id,admin from user where email='$id_or_email' or id='$id_or_email';");
    if($result){
    	$row = mysqli_fetch_array($result, MYSQLI_NUM);
    	$_SESSION["logged_in"] = True;
		$_SESSION["id"] = $row[0];
		$_SESSION["name"] = $row[1];
		$_SESSION["email"] = $row[2];
		updateSchool();
		$_SESSION["admin"] = $row[4];
		updateClassList();
    }
}

// Links a class to the user that is logged in
function linkClass($class_id){
	$user_id = $_SESSION["id"];
	if(query("INSERT INTO linker (user_id, class_id) values ('$user_id', '$class_id');")){
		updateClassList();
		return true;
	}
	else{
		return false;
	}
}

// Unlinks a class to the user that is logged in
function unlinkClass($class_id){
	$user_id = $_SESSION["id"];
	if(query("delete from linker where user_id=$user_id and class_id=$class_id;")){
		updateClassList();
		return true;
	}
	else{
		return false;
	}
}

// Links school to user that is logged in
function linkSchool($school_id){
	$user_id = $_SESSION["id"];
	if($school_id == NULL){
		if(query("update user set school_id=NULL where id=$user_id;")){
			updateSchool();
			return true;
		}
		else{
			return false;
		}
	}
	else{
		if(query("update user set school_id=$school_id where id=$user_id;")){
			updateSchool();
			return true;
		}
		else{
			return false;
		}
	}
}

// Query error handler
function query($query){
	if(isset($_SESSION["error"])){
		unset($_SESSION["error"]);
	}
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(mysqli_connect_errno()){
		$_SESSION["error"] = "Connection error: ".mysqli_connect_error();
		mysqli_close($connection);
		return false;
	}
	$result = mysqli_query($connection, $query);
	if($result){
		mysqli_close($connection);
		return $result;
	}
	else{
		$_SESSION["error"] = debug_backtrace()[1]['function'].": Error: ".mysqli_error($connection);
		mysqli_close($connection);
		return false;
	}
}

// Returns an array given the result of a query
function getArray($result){
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	return $row;
}

// Sets the error session variable
function setError($error_message){
	$_SESSION["error"] = $error_message;
}

// Returns the error message in the error session variable
function getError(){
	if(errors()){
		return $_SESSION["error"];
	}
	else{
		return "";
	}
}

// Returns true if there are any errors in the session
function errors(){
	if(isset($_SESSION["error"])){
		return true;
	}
	else{
		return false;
	}
}

// Clears the error variable in the session
function clearErrors(){
	if(isset($_SESSION["error"])){
		unset($_SESSION["error"]);
	}
}

// Just a nice way to print session variables
function printSession(){
	echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';
}

?>