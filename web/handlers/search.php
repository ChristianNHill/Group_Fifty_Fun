<?php

if(isset($_GET['search'])) {
	$term = $_REQUEST['search'];
	?>
	<p id="results">Showing results for: <?php echo $term; ?> </p> <?php
}

?>