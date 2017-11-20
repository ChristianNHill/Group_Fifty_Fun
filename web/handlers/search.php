<?php

if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	echo "\n";
	?>
	<div id="results">Showing results for: <?php echo $term; ?> </div> <?php echo "\n";
}

?>