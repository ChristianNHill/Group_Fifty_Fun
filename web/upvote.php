<?php
print_r($_GET);
echo var_dump($_REQUEST)."</br>";
/*
	require "user.php";
	//$user_id=$_SESSION['id'];
	$link_id=$_REQUEST['id'];
	echo var_dump($_REQUEST)."</br>";
	echo var_dump($_POST)."</br>";
	echo var_dump($_GET)."</br>";
	//echo $user_id;
	$result = query("SELECT link_id from vote WHERE user_id=$user_id AND link_id=$link_id;");
	if ($result != NULL) {
		$row = getArray($result);
		echo $row[0]."</br>";
		echo $link_id;
		if ($row[0] != $link_id) {
			query("INSERT into vote (link_id, user_id, value) values ($link_id, $user_id, 1);");
			query("UPDATE post SET votes=votes+1 WHERE id=$user_id");
		}
	} else {
		echo "RESULT WAS NULL";
	}
	*/
?>