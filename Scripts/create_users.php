<?php

require '../config.php';
/*
$connection = @mysqli_connect (HOST, USER,PASS, DB);


if(mysqli_connect_errno())
{
echo "Failed to connect to MySQL: ".mysqli_connect_error()."\n";
}
else
{
echo "Successfully connected to MySQL \n";
}*/

require '../web/user.php';

$josh = new User("Josh Brown","jobr3255@colorado.edu","password");
$josh->addNewUser();

$matt = new User("Matthew Donovan","matthew.donovan@colorado.edu","password");
$matt->addNewUser();

$chris = new User("Christian Hill","Christian.N.Hill@Colorado.edu","password");
$chris->addNewUser();

$munta = new User("Muntadhar AlZayer","Muntadher.Alzayer@Colorado.edu","password");
$munta->addNewUser();
$connection = mysqli_connect (HOST, USER,PASS, DB);
$q = "update user set admin=true where id between 1 and 4;";
if(mysqli_query($connection, $q)){
	echo "set admins succeded \n";
}
else{
	echo "set admins failed \n";
}
mysqli_close($connection);

?>