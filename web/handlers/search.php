<?php

if(isset($_GET['search'])) {
	$term = $_REQUEST['search']; 	
	echo "You searched for: ".$term;
}

?>