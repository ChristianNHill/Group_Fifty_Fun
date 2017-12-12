<?php 
require "views/nav.php";
?>
<html>
<head>
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
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
                if(up_image.match("uparrow-not-voted")){
                	document.getElementById("upvote-button").setAttribute("src", "images/uparrow-voted.png");
                	document.getElementById("downvote-button").setAttribute("src", "images/downarrow-not-voted.png");
                }
                else if(up_image.match("uparrow-voted")){
                	document.getElementById("upvote-button").setAttribute("src", "images/uparrow-not-voted.png");
                }
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
                	document.getElementById("upvote-button").setAttribute("src", "images/uparrow-not-voted.png");
                }
                else if(down_image.match("downarrow-voted")){
                	document.getElementById("upvote-button").setAttribute("src", "images/downarrow-not-voted.png");
                }
            }
        };
        xmlhttp.open("GET","voteHandler.php?down="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Josh</option>
  <option value="2">Matt</option>
  <option value="3">Chris</option>
  <option value="4">Munta</option>
  </select>
</form>
<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>

<input type='image' name='1' id='upvote-button' src='images/uparrow-not-voted.png' width='20' height='20' onclick='upVote(this.name)'' />
<div id='displayVotes'></div>
<input type='image' name='1' id='downvote-button' src='images/downarrow-not-voted.png' width='20' height='20' onclick='downVote(this.name)'' />
</body>
</html>