<?php

require '../config.php';

$connection = mysqli_connect(HOST, USER,PASS, DB);

if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ".mysqli_connect_error()."\n";
}
else
{
echo "Successfully connected to MySQL \n";
}

function attempt_query($c, $q, $s){
	if(mysqli_query($c, $q)){
		echo $s." query succeded \n";
	}
	else{
		echo $s." query failed     ";
		echo mysqli_errno($c) . ": " . mysqli_error($c) . "\n";
	}
}

function attempt_query2($con, $sql, $s){
	if (mysqli_multi_query($con,$sql))
	{
		echo $s." query succeded \n";
		if ($result=mysqli_store_result($con)) {
			mysqli_free_result($result);
		}
	}
	else{
		echo $s." query failed     ";
		echo mysqli_errno($con) . ": " . mysqli_error($con) . "\n";
	}
}

attempt_query($connection, "drop table class;", "delete class");
attempt_query($connection, "drop table school;", "delete school");
attempt_query($connection, "drop table user;", "delete user");
attempt_query($connection, "drop table post;", "delete post");
attempt_query($connection, "drop table comment;", "delete comment");
attempt_query($connection, "drop table vote;", "delete vote");
attempt_query($connection, "drop table linker;", "delete linker");



$q = file_get_contents("create.sql").file_get_contents("populate.sql");
attempt_query2($connection, $q, "created and populated tables");

require "create_users.php";

?>