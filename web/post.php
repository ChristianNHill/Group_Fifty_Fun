<!DOCTYPE html>
<html>
<head>
<?php
	require 'nav.php';

	$user_id = $_SESSION['id'];

	if (isset($_GET['post_id'])) {
		$post_id = $_REQUEST['post_id'];
	} else {
		if(isset($_GET['title']) and isset($_GET['content'])){
			$class_id = $_REQUEST['class_id'];
			$title = $_REQUEST['title'];
			$content = $_REQUEST['content'];
			query("insert into post (user_id, class_id, title, content, votes) values ($user_id, $class_id, '$title', '$content', 0);");
			$idResult = query("select max(id) from post;");
			$post_id_row = getArray($idResult);
			$post_id = $post_id_row[0];
		}
	}

	$query = "select * from comment where post_id=$post_id;";
	$query2 = "select * from post where id=$post_id;";
	$result2 = query($query2);
?>
<style>
.post-container{
	margin-left: 250px;
}
.time{
	border-bottom: 1px solid;
}
</style>

<div class='post-container'>
	<div class="title">
		<?php 
			$content = getArray($result2); 
			echo "<h1>".$content[3]."</h1>";
			echo "<div style='font-size:13pt'>".$content[4]."</div>";
			echo "<div class='time' style='font-size:8pt' >".$content[6]."</div>";
		?>
	</div>



	<?php
		
		if (isset($_GET['newcomment'])) {
			$newcom = $_GET['newcomment'];
			$sql = "INSERT INTO comment (post_id,user_id,content) VALUES ($post_id,$user_id,\"$newcom\");";
			if(!query($sql)){
				echo getError();
			}
		}
	?>
	<br>
	<div class='comments'>
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
</div>



</body>
</html>