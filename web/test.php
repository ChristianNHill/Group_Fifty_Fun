<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Testing connection to the database</p>
<?php
/*
connect to mysql server using this command
mysql -h area51-hw.mysql.database.azure.com -u area51@area51-hw -p
the password is A51-HWug
Use this command to run php script on the command line
php -f <filename>.php
*/
//require '/config.php';

// please fill these parameters with the actual data
// Create connection
//phpinfo();

require '../config.php';


$connection = mysqli_connect(HOST, USER,PASS, DB);
if(mysqli_connect_errno()){
	echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error()."\n";
}
else{
	echo "<h4>Successfully connected to MySQL: </h4> \n";
}

//include 'user.php';

//$user = new User("User1","user@email.com","password");
/*
$user = new User(1,$connection);
$user->print();

$user2 = new User("jobr3255@colorado.edu",$connection);
$user2->print();
*/

//echo (new User)->validate_email("jobr3255@colorado.edu", $connection)."\n";
//echo (new User)->validate_email("clearly not in database", $connection)."\n";

//echo validate_credentials("jobr3255@colorado.edu", "password", $connection)."\n";
//echo validate_credentials("jobr3255@colorado.edu", "wrong", $connection)."\n";

?>
</body>
</html>
