<?php
require($_SERVER['DOCUMENT_ROOT']."/../config.php");
$errors = array();
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	session_start();
	$connection = mysqli_connect(HOST, USER,PASS, DB);

	$query = "select * from school where name rlike '".$term."';";
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		echo "<form class='form-inline' action='/../school.php' method='get'> \n";
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<p><a href='school.php'><button class='btn btn-outline-success' type='submit' name='school' value='".$row[0]."'>".$row[1]."</button></a></p>\n";
		}
		echo "</form> \n";
	}
	$query = "select * from class where name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."';";
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<p>".$row[2]." ".$row[3]."</br>".$row[4]."</p> \n";
		}
	}
	if($no_results){
		echo "No results found";
	}
}

?>