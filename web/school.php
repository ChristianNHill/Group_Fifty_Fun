<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "user.php";
require "views/nav.php";
function linked($school_id){
	if(isset($_SESSION["school"])){
		$id = $_SESSION["school"]["id"];
	}
	else{
		$id = NULL;
	}	
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
	$row = mysqli_fetch_array(query("select name from school where id=$id"), MYSQLI_NUM);
	$name = $row[0];
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
	if(linkSchool($school_id)){
		echo "linked successfully";
	}
	else{
		echo "linked failed";
	}
	load_options($school_id);
}

if(isset($_GET['unlink'])){
	$school_id = $_SESSION["school"]["id"];
	if(linkSchool(NULL)){
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
