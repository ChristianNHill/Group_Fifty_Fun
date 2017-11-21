<?php
require($_SERVER['DOCUMENT_ROOT']."/../config.php");
$errors = array();
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];

	$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(mysqli_connect_errno()){
		echo "error";
	}

	$query = "select name from school where name rlike ".$term.";";

	$result = mysqli_query($connection, $query);
	echo $result;
	while ($row = mysqli_fetch_array($result, MYSQLI_NUM)){
		echo "</br>this: ".$row[1];
	}
	//$row = mysqli_fetch_array($result, MYSQLI_NUM);
}

?>