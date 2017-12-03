<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require "user.php";
//require($_SERVER['DOCUMENT_ROOT']."/../config.php");
require "views/nav.php";
//require "../handlers/errorHandler.php";
?>
<?php
if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	echo "\n";
	?>
	<p id="results">Showing results for: <?php echo $term; ?> </p> <?php echo "\n"; ?>
	<div id="results">
	<?php require "handlers/search.php"; ?>
	</div> <?php echo "\n";
}
?>
</body>
</html>
