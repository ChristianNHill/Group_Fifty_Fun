<?php
	 if(session_status()!= 2){

	    session_start();
	 }
        require "user.php";
        require "handlers/errorHandler.php";

     ?>
	<meta name="Homework Underground" content="Homework help website">
    <meta name="Group" content="Group 51, AKA Group Fifty Fun, AKA Area 51, AKA The Chocolate Lads, AKA 4 Single Moms, AKA Guwop Gang (Gangsters WithOut Prejudice) ">
    <meta name="robots" content="index, follow">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
.errors{
	font-weight: bold;
	color: red;
}

.logout-button{
	background-color:lightgray; 
	color:salmon; 
	border:none;
}

.logout-button:hover{
	background-color:lightgray; 
	border:none;
	color: black;
}
.container{
	padding-left: 200px;
}

h1.page-h {
  margin-top: -5px;
}
.sidebar {
     padding-left: 0;
     margin-right: 20px;
     height: 100%;
}
.main-container { 
  background: #FFF;
  padding-top: 69px;
  margin-top: 20px;
     height: 100%;
	}
.footer {
  width: 100%;
}  
.glyphicon,.caret,.navbar-default,.navbar-toggle {
  color: #FA8072;
}
.icon-bar {
  background-color: #FA8073 !important;
}
:focus {
  outline: none;
}

.side-menu #dropdown {
  border: 0;
  margin-bottom: 0;
  border-radius: 0;
  background-color: transparent;
  box-shadow: none;
     height: 100%;
}
.side-menu #dropdown .caret {
  float: right;
  margin: 9px 5px 0;
}
.side-menu #dropdown .indicator {
  float: right;
}

.side-menu .navbar-nav li {
	display: block;
	width: 100%;
	border-bottom: 1px solid #000000;
     height: 100%;
}
.side-menu .navbar-nav li a {
	padding: 15px;
     height: 100%;
}
.side-menu .navbar-nav li a .glyphicon {
	padding-right: 10px;
}

.side-menu .navbar {
	border: none;
     height: 100%;
}
.side-menu .navbar-header {
	width: 100%;
	border-bottom: 1px solid #e7e7e7;
     height: 100%;
}
.side-menu .navbar-nav .active a {
	background-color: transparent;
	margin-right: -1px;
	border-right: 5px solid #FA8072;
}

.side-menu #dropdown > a {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #dropdown .panel-body {
	padding: 0;
	background-color: #f3f3f3;
}
.side-menu #dropdown .{










 .navbar-nav {
	width: 100%;
}
.side-menu #dropdown .panel-body .navbar-nav li {
	padding-left: 15px;
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #search .panel-body .navbar-form .form-group {
	width: 100%;
	position: relative;
}
.side-menu #search .panel-body .navbar-form input {
	border: 0;
	border-radius: 0;
	box-shadow: none;
	width: 100%;
	height: 50px;
}
.side-menu #search .panel-body .navbar-form .btn {
	position: absolute;
	right: 0;
	top: 0;
	border: 0;
	border-radius: 0;
	background-color: #f3f3f3;
	padding: 15px 18px;
}
.side-menu #dropdown .panel-body .navbar-nav li:last-child {
	border-bottom: none;
}
.side-menu #dropdown .panel-body .panel > a {
	margin-left: -20px;
	padding-left: 35px;
}
.side-menu #dropdown .panel-body .panel-body {
	margin-left: -15px;
}
.side-menu #dropdown .panel-body .panel-body li {
	padding-left: 30px;
}
.side-menu #dropdown .panel-body .panel-body li:last-child {
	border-bottom: 1px solid #e7e7e7;
}
.side-menu #search-trigger {
	background-color: #f3f3f3;
	border: 0;
	border-radius: 0;
	position: absolute;
	top: 0;
	right: 0;
	padding: 15px 18px;
}
.side-menu .brand-name-wrapper {
	min-height: 50px;
}
.side-menu .brand-name-wrapper .navbar-brand {
	display: block;
}
.side-menu #search {
	position: relative;
	z-index: 1000;
}
.side-menu #search .panel-body {
	padding: 0;
}
.side-menu #search .panel-body .navbar-form {
	padding: 0;
	padding-right: 50px;
	width: 100%;
	margin: 0;
	position: relative;
	border-top: 1px solid #e7e7e7;
}

/* Main body section */
.side-body {
	margin-left: 400px;
}
/* small screen */
@media (max-width: 768px) {
	.side-menu {
		position: relative;
		width: 100%;
		height: 0;
		border-right: 0;
	}
	.side-menu .navbar {
		z-index: 999;
		position: relative;
		height: 0;
		min-height: 0;
		background-color:none !important;
		border-color: none !important;
	}
	.side-menu .brand-name-wrapper .navbar-brand {
		display: inline-block;
	}
	/* Slide in animation */
@-moz-keyframes slidein {
	0% {
		left: -300px;
	}
	100% {
		left: 10px;
	}
}
@-webkit-keyframes slidein {
	0% {
		left: -300px;
	}
	100% {
		left: 10px;
	}
}
@keyframes slidein {
	0% {
		left: -300px;
	}
	100% {
		left: 10px;
	}
}
@-moz-keyframes slideout {
	0% {
		left: 0;
	}
	100% {
		left: -300px;
	}
}
@-webkit-keyframes slideout {
	0% {
		left: 0;
	}
	100% {
		left: -300px;
	}
}
@keyframes slideout {
	0% {
		left: 0;
	}
	100% {
		left: -300px;
	}
}
/* Slide side menu*/
/* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
.side-menu-container > .navbar-nav.slide-in {
	-moz-animation: slidein 300ms forwards;
	-o-animation: slidein 300ms forwards;
	-webkit-animation: slidein 300ms forwards;
	animation: slidein 300ms forwards;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
.side-menu-container > .navbar-nav {
	/* Add position:absolute for scrollable menu -> see top comment */
	position: fixed;
	left: -300px;
	width: 300px;
	top: 43px;
	height: 100%;
	border-right: 1px solid #e7e7e7;
	background-color: #f8f8f8;
	overflow: auto;
	-moz-animation: slideout 300ms forwards;
	-o-animation: slideout 300ms forwards;
	-webkit-animation: slideout 300ms forwards;
	animation: slideout 300ms forwards;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
@-moz-keyframes bodyslidein {
	0% {
		left: 0;
	}
	100% {
		left: 300px;
	}
}
@-webkit-keyframes bodyslidein {
	0% {
		left: 0;
	}
	100% {
		left: 300px;
	}
}
@keyframes bodyslidein {
	0% {
		left: 0;
	}
	100% {
		left: 300px;
	}
}
@-moz-keyframes bodyslideout {
	0% {
		left: 300px;
	}
	100% {
		left: 0;
	}
}
@-webkit-keyframes bodyslideout {
	0% {
		left: 300px;
	}
	100% {
		left: 0;
	}
}
@keyframes bodyslideout {
	0% {
		left: 300px;
	}
	100% {
		left: 0;
	}
}
/* Slide side body*/
.side-body {
	margin-left: 5px;
	margin-top: 70px;
	position: relative;
	-moz-animation: bodyslideout 300ms forwards;
	-o-animation: bodyslideout 300ms forwards;
	-webkit-animation: bodyslideout 300ms forwards;
	animation: bodyslideout 300ms forwards;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
.body-slide-in {
	-moz-animation: bodyslidein 300ms forwards;
	-o-animation: bodyslidein 300ms forwards;
	-webkit-animation: bodyslidein 300ms forwards;
	animation: bodyslidein 300ms forwards;
	-webkit-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
/* Hamburger */
.navbar-toggle-sidebar {
	position: relative;
	float: left;
	padding: 9px 10px;
	margin-top: 8px;
	margin-right: 15px;
	margin-bottom: 8px;
	background-color: transparent;
	background-image: none;
	border: 1px solid transparent;
	border-radius: 4px;
}
/* Search */
#search .panel-body .navbar-form {
	border-bottom: 0;
}
#search .panel-body .navbar-form .form-group {
	margin: 0;
}
.side-menu .navbar-header {
	/* this is probably redundant */
	position: fixed;
	z-index: 3;
	background-color: #f8f8f8;
}
/* Dropdown tweek */
	#dropdown .panel-body .navbar-nav {
		margin: 0;
	}
}
.card-container.card {
    width: 400px;
    text-align: center;
    padding: 40px 40px;
}
.btn {
    font-weight: 700;
    height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}
/*
 * Card component
 */
.card {
    background-color: #F7F7F7;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
}
.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}
.reauth-email {
    display: block;
    color: #FA8072;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin #inputEmail,
.form-signin #inputPassword,
.form-signin #firstName,
.form-signin #lastName,
.form-signin #confirmPassword,

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.form-signin .form-control:focus {
    border-color: #FA8072;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,9,f,.075),0 0 8px #72ecfa;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px #72ecfa;
}
.btn-signin {
    background-color: #fa8072;
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 14px;
    height: 36px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}
.btn-signin:hover,
.btn-signin:active,
.btn-signin:focus {
    background-color: #FA8072;
}
.forgot-password {
    color: black;
}
.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: #FA8072;
}
    </style>


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>



</head>
<body>
	 
     <?php 
    if(errors()){
    	$er = getError();
    	echo "<p id='errors'>$er</p>";
    }
    function logged_in(){
	if(isset($_SESSION["logged_in"])){
		if($_SESSION["logged_in"]){
	    	return True;
	    }
	    else{
	    	return False;
	    }
	}
	else{
		return False;
	}
}

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
?>
<div class="container-fluid" style=' height:100%; '>
	<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
			<div class="navbar-header">
				

				<a class="navbar-brand" href="home.php">
					<?php
						if(logged_in()){
							echo $_SESSION["name"];
						}
						else{
							echo "Homework Underground";
						}
					?>
					
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      
				<form class="form-inline my-2 my-lg-0"  action='results.php' method='get'>
			 		<input class="form-control mr-sm-2" name="search" action="HUresults.php" type="text" placeholder="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				
				</form>
					<ul class="nav navbar-nav navbar-right">
						<?php
			                if(!logged_in()){
			                	?>
			                	<form class='form-inline' action='login.php' method='get'>
				               <button type='submit'><span class="glyphicon glyphicon-log-in"></span> Login</button>
				               </form>
				               <form class='form-inline' action='register.php' method='get'>
				               <button type='submit'><span class="glyphicon glyphicon-user"></span> Sign Up</submit>
				               </form>
				               <?php             	
			                }
			                else{
			                	echo "<form class='form-inline' action='handlers/logoutHandler.php' method='get'>";
			               	    echo "<button class='btn btn-success btn-lg pull-right logout-button' name='logout' type='submit'>Logout</button>";
			               	    echo "</form>";
			                }
			               ?>
					</ul>
			</div>
		</div>



	</nav>  	
	<div class="container-fluid main-container">
			<div class="col-md-2 sidebar" >
				<div class="row">
				<div class="absolute-wrapper"> </div>
					<!-- Menu -->
					<div class="side-menu">
						<nav class="navbar navbar-default" role="navigation">
							<!-- Main Menu -->
							<div class="side-menu-container">
								<ul class="nav navbar-nav">
									<li class="active"><a href="#"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
									<li><a href="home.php"><span class="glyphicon glyphicon-plane"></span> Home</a></li>
									<!-- Dropdown-->
									<li class="panel panel-default" id="dropdown">
										<a data-toggle="collapse" href="#dropdown-lvl1">
											<span class="glyphicon glyphicon-user"></span> Classes <span class="caret"></span>
										</a>
										<!-- Dropdown level 1 -->
										<div id="dropdown-lvl1" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav">
													<?php	
													$usid = $_SESSION["id"];
													$class_list = $_SESSION["class_list"];
													$i = 0;
													while ($num = $class_list[$i]) {
														$query = "select * from class where id=$num;";
														$result = query($query);
														while ($row = getArray($result)) {
															echo "<form method='get' action='class.php'>";
															echo "<li><button name='class_id' value='$row[0]'>  $row[2] </button></li> ";
															echo "</form>";
														}
														$i++;
													}
												?>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</div>
				</div>  		
			</div>
	

<script type="text/javascript">
$(function () {
    $('.navbar-toggle-sidebar').click(function () {
	$('.navbar-nav').toggleClass('slide-in');
	$('.side-body').toggleClass('body-slide-in');
	$('#search').removeClass('in').addClass('collapse').slideUp(200);
});
$('#search-trigger').click(function () {
	$('.navbar-nav').removeClass('slide-in');
	$('.side-body').removeClass('body-slide-in');
	$('.search-input').focus();
  	});
});
</script>
