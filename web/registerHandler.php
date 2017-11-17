<?php
// Obtain a connection object by connecting to the db
$connection = @mysqli_connect (localhost, root,
Password, lab6);
// please fill these parameters with the actual data

$Id = $_REQUEST['Id']; 
$Name = $_REQUEST['Name']; 
$Quantity = $_REQUEST['Quantity']; 
$Price = $_REQUEST['Price']; 

$insert_query = "INSERT into store (id, name, qty, price) values ('$Id', '$Name', '$Quantity', '$Price')";

$insert_row =  mysqli_query($connection,$insert_query);  // Run the INSERT query.

if($insert_row){
print 'Row Inserted !' .'<br />'; 
include 'store.php'; 
}else{
    echo "<br>ERROR: Could not execute sql. Error code = " . mysqli_error($connection)."<br>";
	die('Error on insert');
}

?>