<DOCTYPE html>
<html>
<head>
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

.button{
    background: url(images/uparrow-not-voted.png) no-repeat;
    cursor:pointer;
    border: none;
    background-size: 20px 20px;
}

.test {
  background-image: url(images/uparrow-not-voted.png);
  background-repeat: no-repeat;
  /* background-position: 50% 50%; */
  /* put the height and width of your image here */
  height: 20px;
  width: 20px;
  border: none;
}

</style>

</head>
<title>HW Underground</title>

<body class="container-fluid" >

<script>
function openNewPost(str){
	if (str == "") {
        document.getElementById("new-post-area").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("new-post-area").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","forumaddpost.php?class_id="+str,true);
        xmlhttp.send();
    }
}
function upVote(str){
	if (str == "") {
        document.getElementById("displayVotes").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("displayVotes").innerHTML = this.responseText;
                var up_image = document.getElementById("upvote-button").getAttribute("src");
                //document.getElementById("downvote-button").setAttribute("src", "images/downarrow-not-voted.png");
                //alert("here");
                //alert(up_image);
                if(up_image.match("uparrow-not-voted")){
                	document.getElementById("upvote-button").setAttribute("src", "images/uparrow-voted.png");
                }
                else if(up_image.match("uparrow-voted")){
                	document.getElementById("upvote-button").setAttribute("src", "images/uparrow-not-voted.png");
                }
                document.getElementById("downvote-button").setAttribute("src", "images/downarrow-not-voted.png");
            }
        };
        xmlhttp.open("GET","voteHandler.php?up="+str,true);
        xmlhttp.send();
    }
}
function downVote(str){
	if (str == "") {
        document.getElementById("displayVotes").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("displayVotes").innerHTML = this.responseText;
                var down_image = document.getElementById("downvote-button").getAttribute("src");
                if(down_image.match("downarrow-not-voted")){
                	document.getElementById("downvote-button").setAttribute("src", "images/downarrow-voted.png");
                }
                else if(down_image.match("downarrow-voted")){
                	document.getElementById("downvote-button").setAttribute("src", "images/downarrow-not-voted.png");
                }
                document.getElementById("upvote-button").setAttribute("src", "images/uparrow-not-voted.png");
            }
        };
        xmlhttp.open("GET","voteHandler.php?down="+str,true);
        xmlhttp.send();
    }
}
</script>


<!--fill with forum posts from database-->
<?php
if (isset($_GET['class_id'])) {
	$classid = $_REQUEST['class_id'];
	$query = "select * from post where class_id=$classid;";
} else {
	echo "MISSING CLASS ID";
	$query = "select * from post;";
}
$result = query($query);

echo "
<button style='padding:10px' width='20%' name='$classid' value='$classid' onclick='openNewPost(this.name)' >Create new post<strong>+</strong></button>
<div id='new-post-area'></div>
</br></br>
</div>";

?>
	
	<?php
	//$r = query("select count(*) from post where class_id=$classid;");
	//$num = (getArray($r))[0];
	//$row = getArray($result);
	while($row = getArray($result)) {
		//echo $query;
		echo "<div class='post-list' >";
		$post_id = $row[0];
		$votes = $row[5];
		
		$up_image = "uparrow-not-voted.png";
		$down_image = "downarrow-not-voted.png";
		
		if(isset($_SESSION['logged_in'])){
			//echo "user is logged in";
			$user_id=$_SESSION['id'];
			$imageResult = query("SELECT value from vote WHERE user_id=$user_id AND link_id=$post_id;");
			if($imageResult){
				$vote_value = getArray($imageResult);
				if(!empty($vote_value)){
					if($vote_value[0] == 1){
						$up_image = "uparrow-voted.png";
						$down_image = "downarrow-not-voted.png";
					}
					else if($vote_value[0] == -1){
						$down_image = "downarrow-voted.png";
						$up_image = "uparrow-not-voted.png";
					}
				}
			}
		}
		echo "<table>
				<tr>
					<td style='width:7.5%; text-align:center'>";
						echo "<input type='image' name='$post_id' id='upvote-button' src='images/$up_image' width='20' height='20' onclick='upVote(this.name)' />
						<div id='displayVotes'>$votes</div>
						<input type='image' name='$post_id' id='downvote-button' src='images/$down_image' width='20' height='20' onclick='downVote(this.name)' />";
			  echo "</td>
				<td style='width10%; text-align:center'> \n";
		echo $row[6];
		echo "</td> \n";
		echo "<form action='post.php' method='get'> \n";
		echo "<td style='width:82.5%'><button class='nut' style='padding:20px;' type='submit' name='post_id' value='$post_id'>".$row[3]."</button></td> \n";
		echo "</form> \n";
		echo "</tr> \n";
		echo "</table> \n";
		echo "</div>";
	}
?>
</div>
</body>
</html>
