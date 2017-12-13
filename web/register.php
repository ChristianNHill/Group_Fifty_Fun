<!DOCTYPE html>
<html lang="en">
<head>


<?php
//require "user.php";
require "nav.php";
//require "handlers/errorHandler.php";
?>


<div class="container">
<form role="form" action="register.php" method="get">
    <h3>Sign up</h3>
    <?php 
    if(errors()){
    	$er = getError();
    	echo "<div class='errors'>$er</div>";
    }
    ?>
    <div class="form-group">
        <label class="control-label">First Name</label>
        <input  name="name" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Name"  />
    </div>
    <div class="form-group">
        <label class="control-label">Email</label>
        <input name="email" maxlength="200" type="email" required="required" class="form-control" placeholder="Enter email" />
    </div>
    <div class="form-group">
        <label class="control-label">Password</label>
        <input name="password" maxlength="200" type="password" required="required" class="form-control" placeholder="Password" />
    </div>
    <div class="form-group">
        <label class="control-label">Confirm Password</label>
        <input name="rpassword" maxlength="200" type="password" required="required" class="form-control" placeholder="Re-enter password"  />
    </div>
    <button class="btn btn-success btn-lg pull-right" name="register" type="submit">Register</button>
</form>
</div>
</body>
</html>