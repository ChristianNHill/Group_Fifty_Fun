<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "user.php";
require "views/nav.php";
?>
<?php

function setClass($class_id){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$query = "select * from class where id=$class_id;";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_array($result, MYSQLI_NUM);
	$class = array("id"=>$row[0], "name"=>$row[2], "department"=>$row[3], "class_code"=>$row[4]);
	mysqli_close($connection);
	return $class;
}

function load_options($class_id){
	$user = $_SESSION["user"];
	$class = setClass($class_id);
	echo "<div id='class_display'>";
	echo "<h1 id='class_title'>".$class['name']."</h1>";
	echo "<h3 id='department'>".$class['department']." ".$class['class_code']."</h3>";
	if(logged_in()){
		echo "<form class='form-inline' action='class.php' method='get'> \n";
		$class_list = $user->classList();
		if(in_array($class_id, $class_list)){
			echo "<p>unfollow class here</br><button class='btn btn-outline-success' type='submit' name='unlink' value='".$class_id."' >Unfollow</button></p>\n";
		}
		else{
			echo "<p>follow this class here</br><button class='btn btn-outline-success' type='submit' name='link' value='".$class_id."' >Follow</button></p>\n";
		}
		echo "</form> \n";
	}
	else{
		echo "log in to follow this class";
	}
	echo "</div>";
}

if(isset($_GET['link'])){
	$class_id = $_REQUEST['link'];
	$user = $_SESSION["user"];
	$class = setClass($class_id);
	if($user->linkClass($class_id)){
		echo "linked successfully";
	}
	else{
		echo "linked failed";
	}
	load_options($class_id);
}

if(isset($_GET['unlink'])){
	$class_id = $_REQUEST['unlink'];
	$user = $_SESSION["user"];
	$class = setClass($class_id);
	if($user->unlinkClass($class_id)){
		echo "unlinked successfully";
	}
	else{
		echo "unlinked failed";
	}
	load_options($class_id);
}

if(isset($_GET['class_id'])){
	load_options($_REQUEST['class_id']);
}

?>
</body>
</html>
