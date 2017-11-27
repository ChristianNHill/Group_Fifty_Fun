<?php
require($_SERVER['DOCUMENT_ROOT']."/../config.php");
$errors = array();
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];

	$connection = mysqli_connect(HOST, USER,PASS, DB);

	$query = "select name from school where name rlike '".$term."';";
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<p>".$row[0]."</p>";
		}
	}
	$query = "select * from class where name rlike '".$term."' or department_code rlike '".$term."' or class_code like '".$term."';";
	$result = mysqli_query($connection, $query);
	$no_results = true;
	if($result){
		$no_results = false;
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<p>".$row[2]." ".$row[3]."</br>".$row[4]."</p>";
		}
	}
	if($no_results){
		echo "No results found";
	}
}

?>