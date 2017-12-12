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

function load_options($class_id){
	$class = getClass($class_id);
	echo "<div id='class_display'>";
	echo "<h1 id='class_title'>".$class['name']."</h1>";
	echo "<h3 id='department'>".$class['department']." ".$class['class_code']."</h3>";
	if(logged_in()){
		echo "<form class='form-inline' action='class.php' method='get'> \n";
		$class_list = $_SESSION["class_list"];
		if(in_array($class_id, $class_list)){
			echo "<p></br><button class='btn btn-outline-success' type='submit' name='unlink' value='".$class_id."' >Unfollow</button></p>\n";
			echo "<input type='hidden' name='class_id' value='$class_id'  />";
		}
		else{
			echo "<p></br><button class='btn btn-outline-success' type='submit' name='link' value='".$class_id."' >Follow</button></p>\n";
			echo "<input type='hidden' name='class_id' value='$class_id'  />";
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
	$class = getClass($class_id);
	if(linkClass($class_id)){
		//echo "linked successfully";
	}
	else{
		//echo "linked failed";
	}
	load_options($class_id);
}
else if(isset($_GET['unlink'])){
	$class_id = $_REQUEST['unlink'];
	$class = getClass($class_id);
	if(unlinkClass($class_id)){
		//echo "unlinked successfully";
	}
	else{
		//echo "unlinked failed";
	}
	load_options($class_id);
}
else if(isset($_GET['class_id'])){
	load_options($_REQUEST['class_id']);
}
require "forum.php";
?>
</body>
</html>
