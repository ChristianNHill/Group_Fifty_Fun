<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "nav.php";
require "../handlers/search.php";
require "../user.php";
require "../handlers/errorHandler.php";
$connection = mysqli_connect(HOST, USER,PASS, DB);
	if(mysqli_connect_errno()){
		return False;
	}
?>
<?php
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	echo "\n";
	?>
	<p id="results">Showing results for: <?php echo $term; ?> </p> <?php echo "\n"; ?>
	<div id="results"></div> <?php echo "\n";
}
?>
</body>
</html>
