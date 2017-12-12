<DOCTYPE html>
<html>
<head>
<?php
	require 'user.php';
	require "views/nav.php";
	if (isset($_GET['post_id'])) {
		$post_id = $_REQUEST['post_id'];
	} else {
		echo "MISSING POST ID";
	}

	$user_id = $_SESSION['id'];

	$query = "select * from comment where post_id=$post_id;";
	$query2 = "select * from post where id=$post_id;";
	$result2 = query($query2);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

<style>

table{
    border: 1px solid black;
    table-layout: fixed;
    width: 100%;
}

tr {
	margin-top: 20px;
	margin-bottom:20px;
}

.title{
	margin:20px;
	font-size:16pt;
}

.comment{
	border-style:solid;
	border-radius:5px;
	border-width:1px;
	padding:8px;
	margin:8px;
	margin-left:25px;
	width:95%;
}

</style>
</head>
<title>HW Underground</title>

<body>

<div class="title">
	<?php 
		$content = getArray($result2); 
		echo $content[3]."</br>";
		echo "<div style='font-size:13pt'>".$content[4]."</div>";
		echo "<div style='font-size:8pt'>".$content[6]."</div>";
	?>
</div>



<?php
	
	if (isset($_GET['newcomment'])) {
		$newcom = $_GET['newcomment'];
		//$user_id = $_SESSION['id'];
		$sql = "INSERT INTO comment (post_id,user_id,content) VALUES ($post_id,$user_id,'$newcom');";
		query($sql);
	} else {
		//echo "no new comment yet dood";
	}
	//echo getError();
?>

<div>
	<?php
	$result = query($query);
	while($row  = getArray($result)) {
		echo "<div class='comment'>$row[3]</br>$row[4]</div>";
	}
	?>


	<form method="get" action="post.php">
	<textarea name="newcomment" class='comment' placeholder='Add a new comment'></textarea>
	<input style="margin-left:25px" type="submit"></input>
	<?php 
	echo "<input name='post_id' value='$post_id' type='hidden'/> ";
	?>
	</form>

</div>



</body>
</html>