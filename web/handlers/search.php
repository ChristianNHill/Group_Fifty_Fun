<?php

function school_results(){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$term = $_REQUEST['search'];
	$query = "select * from school where name rlike '".$term."';";
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		echo "<form class='form-inline' action='/../school.php' method='get'> \n <ul class='results'>\n";
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<li><button class='btn btn-outline-success' type='submit' name='school' value='".$row[0]."'>".$row[1]."</button></li>\n";
		}
		echo "</form> \n </ul> \n";
	}
	return $no_results;
}

function class_results($school_id){
	$connection = mysqli_connect(HOST, USER,PASS, DB);
	$term = $_REQUEST['search'];
	if($school_id){
		$query = "select * from class where (name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."') and school_id=".$school_id.";";
	}
	else{
		$query = "select * from class where name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."';";
	}
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		echo "<form class='form-inline' action='/../class.php' method='get'> \n <ul class='results'>\n";
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<li><button class='btn btn-outline-success' type='submit' name='school' value='".$row[0]."'>".$row[2]."</br>".$row[3]." ".$row[4]."</button></li>\n";
			//echo "<p>".$row[2]." ".$row[3]."</br>".$row[4]."</p> \n";
		}
		echo "</form> \n </ul> \n";
	}
	return $no_results;
}

//require($_SERVER['DOCUMENT_ROOT']."/../config.php");
$errors = array();
if(isset($_GET['search'])) {
	//session_start();
	$no_results = true;
	if(isset($_SESSION["user"])){
		$user = $_SESSION["user"];
		$school_id = $user->getSchoolID();
		if($school_id){
			$temp1 = school_results();	
			$temp2 = class_results($school_id);
			$no_results = $temp1 and $temp2;
		}
		else{
			$temp1 = school_results();
			$temp1 = class_results();
			$no_results = $temp1 and $temp2;
		}
	}
	
	if($no_results){
		echo "No results found";
	}
}

?>