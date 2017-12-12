<DOCTYPE html>
<html>
<head>
<?php
	require "user.php";
	require "views/nav.php";
	if (isset($_GET['class_id'])) {
		$classid = $_REQUEST['class_id'];
	} else {
		echo "MISSING CLASS ID";
	}
	$query = "select * from post;";
	$result = query($query);
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

.nut{
	width:100%;
}

</style>

</head>
<title>HW Underground</title>

<body class="container-fluid" >
<form action="forumaddpost.php" method="get">
	<button style="padding:10px"; width="20%">Create new post<strong>+</strong></button></br></br>
  	<table>
  		<tr>
  			<td width="7.5%">
 			Title:   
 			</td>
 			<td>
 			<input type="text" name="title" min="1" max="50" placeholder="Post title" size="51"></input></br>
 			</td>
 		</tr>
 		<tr>
 			<td>
  			Content: 
  			</td>
  			<td>
  			<textarea name="content" placeholder="Type your submission here" rows="10" cols="50"></textarea>
			</td>
		</tr>
	</table>
 </form>
</br></br>
</div>


<!--fill with forum posts from database-->
<div>
	<form action="post.php" method="get">
	<?php
	while($row  = mysqli_fetch_array($result, MYSQLI_NUM)) {
		echo "<table>";
		echo "<tr>";
		echo "<td style='width:7.5%; text-align:center'>";
		echo "<table><tr><button>up </button></tr>".$row[5]."<tr><button> down</button></tr></table>";
		echo "</td>";
		echo "<td style='width10%; text-align:center'>";
		echo $row[6];
		echo "</td>";
		echo "<td style='width:82.5%'><button class='nut' style='padding:20px;' type='submit' name='post_id' value='".$row[0]."'>".$row[3]."</button></td>";
		echo "</tr>";
		echo "</table>";
	}
?>
	</form>
</div>
</body>
</html>