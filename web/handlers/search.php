<?php

function school_results(){
	$term = $_REQUEST['search'];
	$query = "select * from school where name rlike '".$term."';";
	$result = query("select * from school where name rlike '".$term."';");
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
	$term = $_REQUEST['search'];
	if($school_id){
		$query = "select * from class where (name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."') and school_id=".$school_id.";";
	}
	else{
		$query = "select * from class where name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."';";
	}
	$result = query($query);
	$no_results = true;
	if($result){
		$no_results = false;
		echo "<form class='form-inline' action='/../class.php' method='get'> \n <ul class='results'>\n";
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<li><button class='btn btn-outline-success' type='submit' name='class_id' value='".$row[0]."'>".$row[2]." ".$row[3]." ".$row[4]."</button></li>\n";
		}
		echo "</form> \n </ul> \n";
	}
	return $no_results;
}

if(isset($_GET['search'])) {
	$no_results = true;
	if(isset($_SESSION["logged_in"])){
		if(isset($_GET['school'])){
			$school_id = $_SESSION["school"]["id"];
		}
		else{
			$school_id = NULL;
		}
		if($school_id){
			$temp1 = school_results();	
			$temp2 = class_results($school_id);
			$no_results = $temp1 and $temp2;
		}
		else{
			$temp1 = school_results();
			$temp2 = class_results(NULL);
			$no_results = $temp1 and $temp2;
		}
	}
	else{
		$temp1 = school_results();
		$temp2 = class_results(NULL);
		$no_results = $temp1 and $temp2;
	}
	
	if($no_results){
		echo "No results found";
	}
}

?>