<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
require "user.php";
require "views/nav.php";
?>
<?php
$user = $_SESSION["user"];
if(logged_in()){
	?>
	<div id="profile">
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1>
		<p id="school_name">
			<?php
			if(isset($_SESSION["school_id"])){
				$connection = mysqli_connect(HOST, USER,PASS, DB);
				$query = "select name from school where id=".$user->getID().";";
				$result = mysqli_query($connection, $query);
				$name = mysqli_fetch_array($result, MYSQLI_NUM)[0];
				echo "School: ".$name;
			}
			else{
				echo "Your school is not yet set";
			}?>
		</p>
	</div>
	<?php

}
else{
	?><h1>You are not logged in!</h1>
	<a href="login.php">Login here!</a><?php
}
?>
</body>
</html>
