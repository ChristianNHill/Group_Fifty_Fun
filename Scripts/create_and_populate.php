<?php

require '../config.php';

$connection = @mysqli_connect (HOST, USER,PASS, DB);

if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ".mysqli_connect_error()."\n";
}
else
{
echo "Successfully connected to MySQL \n";
}

$queryRan = True;
/*
$query = "drop table class;";
$queryRan &= mysqli_query($connection, $query);
$query = "drop table school;";
$queryRan &= mysqli_query($connection, $query);
$query = "drop table user;";
$queryRan &= mysqli_query($connection, $query);
$query = "drop table post;";
$queryRan &= mysqli_query($connection, $query);
$query = "drop table comment;";
$queryRan &= mysqli_query($connection, $query);
$query = "drop table vote;";
$queryRan &= mysqli_query($connection, $query);
*/
$query = "source create.sql;";
$queryRan &= mysqli_query($connection, $query);
$query = "source populate.sql;";
$queryRan &= mysqli_query($connection, $query);

if($queryRan){
	echo "created and populated database \n";
}
else{
	echo "query failed \n";
}

?>