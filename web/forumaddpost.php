
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
