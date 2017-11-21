<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "views/nav.php";
require "handlers/search.php";
//require "../user.php";
//require "../handlers/errorHandler.php";
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
