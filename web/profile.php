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

function load_school(){
	echo "<p id='school_name'>";
		if(isset($_SESSION["school"])){
			$name = $_SESSION["school"]["name"];
			echo "<form class='form-inline' action='school.php' method='get'> \n";
			echo "School: ".$name;
			echo "<p><button class='btn btn-outline-success' type='submit' name='unlink' >Unlink</button></p>\n";
			echo "</form>";
		}
		else{
			echo "Your school is not yet set";
		}
	echo "</p>";
}

function load_classes(){
	echo "<p id='class_list'>";
	if(isset($_SESSION["class_list"])){
		$class_list = $_SESSION["class_list"];
	}
	else{
		$class_list = array();
	}
		if(!empty($class_list)){
			echo "<form class='form-inline' action='class.php' method='get'> \n";
			echo "<ul id='class_list'>";
			for($i=0; $i < sizeof($class_list); $i++){
				$class = getClass($class_list[$i]);
				echo "<li>";
				//echo $class['name']." ".$class['department']." ".$class['class_code'];
				$button_display = $class['name']." ".$class['department']." ".$class['class_code'];
				echo "<button class='btn btn-outline-success' type='submit' name='class_id' value='".$class['id']."'>$button_display</button>\n";
				echo "<button class='btn btn-outline-success' type='submit' name='unlink' value='".$class["id"]."' >Unlink</button></li>\n";
			}
			echo "</ul></form>";
		}
		else{
			echo "Your have not followed any classes yet";
		}
	echo "</p>";
}

if(logged_in()){
	?>
	<div id="profile">
	<h1>Welcome to your profile page, <?php echo $_SESSION["name"]; ?>!</h1>
		<?php 
		load_school();
		load_classes();
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
