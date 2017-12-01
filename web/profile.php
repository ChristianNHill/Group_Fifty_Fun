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

function load_school($user){
	echo "<p id='school_name'>";
		if(isset($_SESSION["school_id"])){
			$connection = mysqli_connect(HOST, USER,PASS, DB) or  die("Could Not Connect to DB: ".mysql_error());
			$query = "select name from school where id=".$user->getID().";";
			$result = mysqli_query($connection, $query);
			$name = mysqli_fetch_array($result, MYSQLI_NUM)[0];
			echo "<form class='form-inline' action='school.php' method='get'> \n";
			echo "School: ".$name;
			echo "<p><button class='btn btn-outline-success' type='submit' name='unlink' >Unlink</button></p>\n";
			echo "</form>";
		}
		else{
			echo "Your school is not yet set";
		}
	echo "</p>";
	mysqli_close($connection);
}

function load_classes($user){
	echo "<p id='class_list'>";
	$class_list = $user->classList();
		if(!empty($class_list)){
			echo "<form class='form-inline' action='class.php' method='get'> \n";
			echo "<ul id='class_list'>";
			for($i=0; $i < sizeof($class_list); $i++){
				$class = getClass($class_list[$i]);
				echo "<li>";
				echo $class['name']." ".$class['department']." ".$class['class_code'];
				echo "<button class='btn btn-outline-success' type='submit' name='unlink' >Unlink</button></li>\n";
			}
			echo "</ul></form>";
		}
		else{
			echo "Your have not followed any classes yet";
		}
	echo "</p>";
}

$user = $_SESSION["user"];
if(logged_in()){
	?>
	<div id="profile">
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1>
		<?php 
		load_school($user);
		load_classes($user);
		?>
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
