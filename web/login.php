<!DOCTYPE html>
<html lang="en">
<head>

            <?php
                //require "user.php";
                require "nav.php";
                //require "handlers/errorHandler.php";
            ?>
            <div class="container">
            <form role="form" action="login.php" method="get">
            <h3>Login</h3>
                <?php 
    if(errors()){
    	$er = getError();
    	echo "<div class='errors'>$er</div>";
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