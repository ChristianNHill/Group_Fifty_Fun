<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "user.php";
require "views/nav.php";
function linked($sid){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$query = "select school_id from user where id=".$_SESSION["id"].";";
	$result = mysqli_query($connection, $query);
	$school_id = mysqli_fetch_array($result, MYSQLI_NUM)[0];
	if($school_id == NULL){
		return false;
	}
	else if($school_id != $sid){
		return false;
	}
	else{
		return true;
	}
}

function load_options($id){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$query = "select name from school where id=".$id.";";
	$result = mysqli_query($connection, $query);
	$name = mysqli_fetch_array($result, MYSQLI_NUM)[0];
	echo "<h1 id='school_title'>".$name."</h1>";
	echo "<p>";
	if(logged_in()){
		echo "<form class='form-inline' action='school.php' method='get'> \n";
		if(linked($id)){
			echo "<p>unlink school here</br><button class='btn btn-outline-success' type='submit' name='unlink' >Unlink</button></p>\n";
		}
		else{
			echo "<p>link this school to your account here</br><button class='btn btn-outline-success' type='submit' name='link' value='".$id."' >Link</button></p>\n";
		}
		echo "</form> \n";
	}
	else{
		echo "log in to link this school to your account";
	}
	echo "</p>";
}
?>
<?php
//$id = $_REQUEST['id'];
//$name = $_REQUEST['name'];
//echo $name;
if(isset($_GET['link'])){
	/*
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$query = "update user set school_id=".$_REQUEST['link']." where id=".$_SESSION["id"].";";
	if(mysqli_query($connection, $query)){
		echo "linked successfully";
	}
	*/
	$school_id = $_REQUEST['link'];
	$user = $_SESSION["user"];
	
	if($user->setSchoolID($school_id)){
		echo "linked successfully";
	}
	else{
		echo "linked failed";
	}
	load_options($school_id);
}

if(isset($_GET['unlink'])){
	/*
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$query = "select school_id from user where id=".$_SESSION["id"].";";
	$result = mysqli_query($connection, $query);
	$id = mysqli_fetch_array($result, MYSQLI_NUM)[0];
	$query = "update user set school_id=NULL where id=".$_SESSION["id"].";";
	if(mysqli_query($connection, $query)){
		echo "unlinked successfully";
	}
	*/
	
	$user = $_SESSION["user"];
	$school_id = $user->getSchoolID();
	
	if($user->setSchoolID(NULL)){
		echo "unlinked successfully";
	}
	else{
		echo "unlinked failed";
	}
	load_options($school_id);

}

if(isset($_GET['school'])) {
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$id = $_REQUEST['school'];
	load_options($id);
}

?>
</body>
</html>
