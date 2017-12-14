<!DOCTYPE html>
<html lang="en">
<head>

<?php
require "nav.php";

if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	echo "\n";
	?>
	<div class='container'>
	<p id="results">Showing results for: <?php echo $term; ?> </p> <?php echo "\n"; ?>
	<?php require "handlers/search.php"; ?>
	</div> <?php echo "\n";
}
?>

</body>
</html>