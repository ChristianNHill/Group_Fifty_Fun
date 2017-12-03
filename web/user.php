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

printSession()
Just a nice way to print session variables
*/


   require($_SERVER['DOCUMENT_ROOT']."/../config.php");
//require '../config.php';
class User{
	private $id = "NULL";
	private $name = "NULL";
	private $email = "NULL";
	//private $password = "NULL";
	private $school_id = "NULL";
	private $school;// = NULL; //array();
	private $admin = "NULL";
	//private $connection = "NULL";
	private $class_list = array();

	/*
	This is the contructor for the user class calls either 
	construct2 or construct3 depending on how many variables 
	are passed to the constructor 
	*/
	function __construct() 
    { 
        $a = func_get_args(); 
        $i = func_num_args(); 
        if (method_exists($this,$f='__construct'.$i)) { 
            call_user_func_array(array($this,$f),$a); 
        } 
    }

	/*
    Arg1 is the id or the email of the user to retrieve from the database
    */
    function __construct1($i) 
    {
    	$connection = mysqli_connect(HOST, USER,PASS, DB);
    	$q = "select * from user where email = '$i';";
        $result = mysqli_query($connection, $q);
        if($result){
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
        }
        else{
        	$q = "select * from user where id = $i;";
        	$result = mysqli_query($connection, $q);
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
        }
		mysqli_close($connection);
        $this->id = $row[0];
		$this->name = $row[1];
		$this->email = $row[2];
		//$this->password = $row[3];
		$this->school_id = $row[4];
		$this->admin = $row[5];
		//$this->connection = $connection;
		$this->class_list = $this->classList();
    } 

    /*
    Arg1 is the id of the user to retrieve from the database
    or it can be the email of the user
    Arg2 is the connection to the database
    */
    function __construct2($i, $connection) 
    { 
    	$q = "select * from user where email='$i' or id=$i;";
        $result = mysqli_query($connection, $q);
        if($result){
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $row[0];
			$this->name = $row[1];
			$this->email = $row[2];
			//$this->password = $row[3];
			$this->school_id = $row[4];
			$this->admin = $row[5];
			//$this->connection = $connection;
			$this->class_list = $this->classList();
        }
        /*
        else{
        	$q = "select * from user where id = $i;";
        	$result = mysqli_query($connection, $q);
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $row[0];
			$this->name = $row[1];
			$this->email = $row[2];
			//$this->password = $row[3];
			$this->school_id = $row[4];
			$this->admin = $row[5];
			//$this->connection = $connection;
			$this->class_list = $this->classList();
        }
        */
    } 
    /*
	Arg1 is the name of the user
	Arg2 is the email of the user
	Arg3 is the password for the user
    */
	function __construct3($n, $e, $p){
		$connection = mysqli_connect(HOST, USER,PASS, DB);
		/*
		if(mysqli_connect_errno()){
			$this->connection = mysqli_connect_error();
		}
		else{
			$this->connection = $connection;
		}*/
		$this->name = $n;
		$this->email = $e;
		$this->password = encrypt($p);
	}

	// Returns the school_id of the user
	function getSchoolID(){
		return $this->school_id;
	}

	// Returns true if the user is an admin
	function admin(){
		return $this->admin;
	}

	// Returns the name of the user
	function getName(){
		return $this->name;
	}

	// Returns the email of the user
	function getEmail(){
		return $this->email;
	}

	// Returns the id of the user
	function getID(){
		return $this->id;
	}

	// Sets the school_id for a user
	function setSchoolID($sid){
		$connection = mysqli_connect(HOST, USER,PASS, DB);
		if($sid != NULL){
			$query = "update user set school_id=".$sid." where id=".$this->id.";";

		}
		else{
			$query = "update user set school_id=NULL where id=".$this->id.";";
		}
		if(mysqli_query($connection, $query)){
			$this->school_id = $sid;
			$_SESSION["school_id"] = $sid;
			mysqli_close($connection);
			return true;
		}
		else{
			mysqli_close($connection);
			return false;
		}
	}

	// Returns a list of class ids that user has followed
	function classList(){
		$connection = mysqli_connect(HOST, USER,PASS, DB);
		$query = "select class_id from linker where user_id=".$this->id.";";
		$result = mysqli_query($connection, $query);
		$class_list = array();
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			array_push($class_list, $row[0]);
		}
		mysqli_close($connection);
		return $class_list;
	}

	// Links the user to a class
	function linkClass($class_id){
		$connection = mysqli_connect(HOST, USER,PASS, DB);
		$q = "INSERT INTO linker (user_id, class_id) values ('$this->id', '$class_id');";
		if(mysqli_query($connection, $q)){
			mysqli_close($connection);
			return 1;
		}
		else{
			mysqli_close($connection);
			return 0;
		}
	}

	// unlinks the user to a class
	function unlinkClass($class_id){
		$connection = mysqli_connect(HOST, USER,PASS, DB);
		$q = "delete from linker where user_id=".$this->id." and class_id=$class_id;";
		//echo $q;
		if(mysqli_query($connection, $q)){
			mysqli_close($connection);
			return 1;
		}
		else{
			mysqli_close($connection);
			return 0;
		}
	}

	//Adds user to the database
	function addNewUser(){
		$q = "INSERT INTO user (name, email, password) values ('$this->name', '$this->email', '$this->password');";
		if(mysqli_query($this->connection, $q)){
			$id_query = "select id from user where email='$this->email';";
			$result = mysqli_query($this->connection, $id_query);
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $row[0];
			$this->admin = false;
			return 1;
		}
		else{
			return 0;
		}
	}

	//Deletes user from the database
	function deleteUser(){
		if($this->connection != "NULL"){
			$q = "delete from user where id = $this->id;";
			if(mysqli_query($this->connection, $q)){
				return True;
			}
			else{
				return False;
			}
		}
		else{
			return False;//"User not connected to database";
		}
	}

	// Sets the session variables for a user that is logged in
	function logIn(){
		//$_SESSION["user"] = $this;
		$_SESSION["logged_in"] = True;
		$_SESSION["id"] = $this->id;
		$_SESSION["name"] = $this->name;
		$_SESSION["email"] = $this->email;
		$_SESSION["school_id"] = $this->school_id;
		$_SESSION["admin"] = $this->admin;
		$_SESSION["class_list"] = $this->class_list;
	}


}

//Adds user to the database
function addNewUser($name, $email, $password){
	if(query("INSERT INTO user (name, email, password) values ('$name', '$email', '$password');")){
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
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$q = "select email from user where email = '$email';";
	$result = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	mysqli_close($connection);
    if(count($row) > 0){
    	return 1;
    }
    else{
    	return False;
    }
}

 
//Returns true if the user with the given email matches the password 
function validate_credentials($email, $password){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$q = "select email,password from user where email = '$email';";
	$result = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	mysqli_close($connection);
	if($row[1] == encrypt($password)){
		return True;
	}
	else{
		return False;
	}
}

// Returns associative array of class variables keys:id, name, department, class_code
function getClass($class_id){
	//$connection = mysqli_connect(HOST, USER,PASS, DB);
	//$query = "select * from class where id=$class_id;";
	$result = query("select * from class where id=$class_id;");//mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$class = array("id"=>$row[0], "name"=>$row[2], "department"=>$row[3], "class_code"=>$row[4]);
	//mysqli_close($connection);
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
	while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		array_push($class_list, $row[0]);
	}
	$_SESSION["class_list"] = $class_list;
}

// Sets session variable school for the current user
function updateSchool(){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	//$query = "select school_id from user where user_id=$user_id;";
	$user_id = $_SESSION["id"];
	$result = query("select school_id from user where id=$user_id;");//mysqli_query($connection, $query);
	//checkResult($result);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$school_id = $row[0];
	if($school_id != NULL){
		//$query = "select * from school where school_id=$school_id;";
		$result = query("select * from school where id=$school_id;");//mysqli_query($connection, $query);
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
		//$_SESSION["school_id"] = $row[3];
		$_SESSION["admin"] = $row[4];
		updateClassList();
		//$_SESSION["class_list"] = $this->class_list;
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

// Just a nice way to print session variables
function printSession(){
	echo '<pre>';
	var_dump($_SESSION);
	echo '</pre>';
}

?>