<?php require("actions/signupAction.php"); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
	<br>
	<form class="container" method="POST" style="margin: 0 auto;">

		<?php if(isset($errormsg)){echo "<p>" .$errormsg. "</p>" ;} ?>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">First Name</label>
	    <input type="text" class="form-control" name="first_name">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Last Name</label>
	    <input type="text" class="form-control" name="last_name">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Pseudonym</label>
	    <input type="text" class="form-control" name="pseudonym">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Password</label>
	    <input type="password" class="form-control" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary" name="validate">Sign Up</button>

	  <p><br><a href="login.php">You already have an acount? Click to login</a> / <a href="index.php">Go back to main page</a></p>
	</form>

</body>
</html>
