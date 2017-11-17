<!DOCTYPE html>
<html>
<head>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">	

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function () {

});
	</script>
	<style type="text/css">
		
		body{ 
    margin-top:40px; 
}




	</style>
</head>
<body>
<div class="container">
<form role="form">
                <h3>Sign up</h3>
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input  name="fname" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name"  />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input  name ="lname" maxlength="100" type="text" required="required" class="form-control" placeholder="Enter Last Name" />
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input name="email" maxlength="200" type="email" required="required" class="form-control" placeholder="Enter .edu email" />
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input name="password" maxlength="200" type="password" required="required" class="form-control" placeholder="Password" />
                </div>
                <div class="form-group">
                    <label class="control-label">Retype Password</label>
                    <input name="rpassword" maxlength="200" type="text" required="required" class="form-control" placeholder="Yes, I know"  />
                </div>
                <button class="btn btn-success btn-lg pull-right" type="submit">Register</button>
</form>
</div>
</body>
</html>