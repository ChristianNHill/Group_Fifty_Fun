<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php 
require($_SERVER['DOCUMENT_ROOT']."/views/nav.php");
require($_SERVER['DOCUMENT_ROOT']."/handlers/errorHandler.php");
?>
<div class="container">
<form role="form" action="login.php" method="get">
    <h3>Login</h3>
    <?php 
    if(!empty($errors)){
    	foreach ($errors as $er){
    		echo "<p id='errors'>$er</p>";
    	}
    }
    ?>
    <div class="form-group">
        <label class="control-label">Email</label>
        <input name="email" maxlength="200" type="email" required="required" class="form-control" placeholder="Enter .edu email" />
    </div>
    <div class="form-group">
        <label class="control-label">Password</label>
        <input name="password" maxlength="200" type="password" required="required" class="form-control" placeholder="Password" />
    </div>
    <button class="btn btn-success btn-lg pull-right" name="login" type="submit">Login</button>
	Not registered? <a href="register.php">Register here!</a>
</form>
</div>
</body>
</html>