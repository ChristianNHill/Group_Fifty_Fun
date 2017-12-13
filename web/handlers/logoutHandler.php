<?php
    if(isset($_GET['logout'])) {
    	session_start();
        session_destroy();
        echo "loggedout";
        header("Location: ../home.php");
    }
?>