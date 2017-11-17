<?php

class User{
	private $id = "NULL";
	private $name = "NULL";
	private $email = "NULL";
	private $password = "NULL";
	private $connection = "NULL";


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
    Arg1 is the id of the user to retrieve from the database
    or it can be the email of the user
    Arg2 is the connection to the database
    */
    function __construct2($i, $connection) 
    { 
        $q = "select * from user where id = $i;";
        $result = mysqli_query($connection, $q);
        if($result){
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $i;
			$this->name = $row[1];
			$this->email = $row[2];
			$this->password = $row[3];
			$this->connection = $connection;
        }
        else{
        	$q = "select * from user where email = '$i';";
        	$result = mysqli_query($connection, $q);
        	$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $row[0];
			$this->name = $row[1];
			$this->email = $row[2];
			$this->password = $row[3];
			$this->connection = $connection;
        }
    } 
    /*
	Arg1 is the name of the user
	Arg2 us the email of the user
	Arg3 is the password for the user
    */
	function __construct3($n, $e, $p){
		$this->name = $n;
		$this->email = $e;
		$this->password = encrypt($p);
	}

	// Prints the values of the user
	function print(){
		echo $this->id.", ".$this->name.", ".$this->email.", ".$this->password."\n";
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

	//Adds user to the database
	function addNewUser($connection){
		$q = "INSERT INTO user (name, email, password) values ('$this->name', '$this->email', '$this->password');";
		if(mysqli_query($connection, $q)){
			$id_query = "select max(id) from user;";
			$result = mysqli_query($connection, $id_query);
			$row = mysqli_fetch_array($result, MYSQLI_NUM);
			$this->id = $row[0];
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
				return "User ".$this->id." deleted from database";
			}
			else{
				return "User ".$this->id." was not deleted from database";
			}
		}
		else{
			return "User not connected to database";
		}
	}
}

function encrypt($password){
	return md5($password);
}

// Returns true if an email exits in the database
function validate_email($email, $connection){
	$q = "select email from user where email = '$email';";
	$result = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
    if(count($row) > 0){
    	return True;
    }
    else{
    	return False;
    }
}

 
//Returns true if the user with the given email matches the password 
function validate_credentials($email, $password, $connection){
	$q = "select email,password from user where email = '$email';";
	$result = mysqli_query($connection, $q);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	if($row[1] == encrypt($password)){
		return True;
	}
	else{
		return False;
	}
}


?>