
<?php
	require "user.php";
	//require "views/nav.php";
	if (isset($_GET['class_id'])) {
		$classid = $_REQUEST['class_id'];
		$query = "select * from post where class_id=$classid;";
	} else {
		echo "MISSING CLASS ID";
		$query = "select * from post;";
	}
	$result = query($query);
?>

<link rel="stylesheet" href="httpss://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

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

<?php
echo "

<form action='post.php' method='get'>
  	<table>
  		<tr>
  			<td width='7.5%'>
 			Title:   
 			</td>
 			<td>
 			<input type='text' name='title' min='1' max='50' placeholder='Post title' size='51' required='required' ></input></br>
 			</td>
 		</tr>
 		<tr>
 			<td>
  			Content: 
  			</td>
  			<td>
  			<textarea name='content' placeholder='Type your submission here' rows='10' cols='50' required='required'></textarea>
  			<input type='hidden' name='class_id' value='$classid' />
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type='submit' onclick='' >Submit</button>
			</td>
		</tr>
	</table>
 </form>
</br></br>
</div>";
?>
