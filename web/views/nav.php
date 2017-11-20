<?php session_start(); ?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php
//Returns True if the user is logged in and false otherwise
function logged_in(){
	if(isset($_SESSION["logged_in"])){
		if($_SESSION["logged_in"]){
	    	return True;
	    }
	    else{
	    	return False;
	    }
	}
	else{
		return False;
	}
}
?>

<nav class="navbar navbar-inverse bg-inverse">
	<a class="navbar-brand" href="home.php">Homework Underground</a>
	<form class="form-inline" action='handlers/logoutHandler.php' method='get'>
	<a href="/home.php"><button class="btn btn-outline-success" type="button">Home</button></a>
	<?php 
	if(logged_in()){
		echo "<a href='profile.php'><button class='btn btn-outline-success' type='button'>Profile</button></a>\n";
	}
	else{
		echo "<a href='register.php'><button class='btn btn-outline-success' type='button'>Register</button></a>\n";
	}
	?>
	<?php 
	if(logged_in()){
		echo "<button class='btn btn-outline-success' name='logout' type='submit'>Log Out</button>\n";
	}
	else{
		echo "<a href='login.php'><button class='btn btn-outline-success' type='button'>Log In</button></a>\n";
	}
	?>
	</form>
	<form class="form-inline my-2 my-lg-0" action='views/results.php' method='get'>
	  <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search">
	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
</nav>