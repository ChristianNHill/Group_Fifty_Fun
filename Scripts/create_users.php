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

include 'user.php';

$josh = new User("Josh Brown","jobr3255@colorado.edu","password");
$josh->addNewUser($connection);

$matt = new User("Matthew Donovan","matthew.donovan@colorado.edu","password");
$matt->addNewUser($connection);

$chris = new User("Christian Hill","Christian.N.Hill@Colorado.edu","password");
$chris->addNewUser($connection);

$munta = new User("Muntadhar AlZayer","Muntadher.Alzayer@Colorado.edu","password");
$munta->addNewUser($connection);

?>