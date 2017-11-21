<?php
require($_SERVER['DOCUMENT_ROOT']."/../config.php");
$errors = array();
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];

	$connection = mysqli_connect(HOST, USER,PASS, DB);
	
	$query = "select name from school where name rlike '".$term."';";
	$result = mysqli_query($connection, $query);
	if($result){
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			echo "<p>".$row[0]."</p>";
		}
	}
	else{
		echo "No results found";
	}
}

?>