<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "user.php";
require "views/nav.php";
function linked($school_id){
	$id = $_SESSION["school"]["id"];
	if($school_id == NULL){
		return false;
	}
	else if($id != $school_id){
		return false;
	}
	else{
		return true;
	}
}

function load_options($id){
	$name = $_SESSION["school"]["name"];
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
if(isset($_GET['link'])){
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
	$id = $_REQUEST['school'];
	load_options($id);
}

?>
</body>
</html>
