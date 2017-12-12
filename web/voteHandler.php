
<?php
	session_start();
	require "user.php";
	
	if(isset($_SESSION['logged_in'])){
		//echo "user is logged in";
		$user_id=$_SESSION['id'];
		if(isset($_GET['up'])){
			$link_id = $_GET['up'];
			vote($link_id, 1);
		}
		else if(isset($_REQUEST['down'])){
			$link_id = $_REQUEST['down'];
			vote($link_id, -1);
		}
		//header('Location: forum.php');
	}
	else{
		//echo "user not logged in";
		//header('Location: forum.php');
	}

	function vote($link_id, $value){
		$user_id=$_SESSION['id'];
		$result = query("SELECT link_id,value from vote WHERE user_id=$user_id AND link_id=$link_id;");
		$row = getArray($result);
		
		if (empty($row)){
			// First vote
			query("INSERT into vote (link_id, user_id, value) values ($link_id, $user_id, $value);");
			updatePostVotes($link_id);
		}
		else if($row[1] != $value) {
			// Change vote
			query("UPDATE vote SET value=$value WHERE user_id=$user_id AND link_id=$link_id;");
			updatePostVotes($link_id);
		}
		else{
			// Undo vote
			$row = getArray($result);
			query("delete from vote where user_id=$user_id and link_id=$link_id;");
			updatePostVotes($link_id);
		}
	}

	function updatePostVotes($post_id){
		$result = query("select sum(value) from vote where link_id=$post_id;");
		$row = getArray($result);
		$voteCount = $row[0];
		if($voteCount){
			query("UPDATE post SET votes=$voteCount WHERE id=$post_id;");
			echo $voteCount;
		}
		else{
			query("UPDATE post SET votes=0 WHERE id=$post_id;");
			echo "0";
		}
	}
?>