<?php require('actions/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
	<br>
	<form class="container" method="POST">

		<?php if(isset($errormsg)){echo "<p>" .$errormsg. "</p>" ;} ?>

	  <div class="mb-3">
	    <label for="exampleInputEmail1" class="form-label">Pseudonym</label>
	    <input type="text" class="form-control" name="pseudonym">
	  </div>
	  <div class="mb-3">
	    <label for="exampleInputPassword1" class="form-label">Password</label>
	    <input type="password" class="form-control" name="password">
	  </div>
	  <button type="submit" class="btn btn-primary" name="validate">Connect</button>
	  <p><br><a href="signup.php">You don't have an account? Click to sign up</a> / <a href="index.php">Go back to main page</a></p>
	</form>

</body>
</html>