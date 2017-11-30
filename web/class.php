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
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$id = $_REQUEST['school'];
	load_options($id);
}

?>
</body>
</html>
