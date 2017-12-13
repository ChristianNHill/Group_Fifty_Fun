<!DOCTYPE html>
<html lang="en">
<head>

<?php require "nav.php"; ?>

<div class="col-md-8 content">
	<div class="panel panel-default">
		<div class="panel-heading">
			Dashboard
		</div>
		<div class="panel-body">
			<h1><?php
			//printSession();
			if(logged_in()){	
				load_school();
				load_classes();
			}
			?></h1>

		</div>
	</div>
</div>
</body>
</html>