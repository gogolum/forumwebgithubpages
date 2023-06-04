<?php require('actions/securityAction.php');
require('actions/gettopthreadAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<?php 
include 'includes/head.php';
 ?>

<body>
	<div class="container-fluid" style="margin: 0; background: #2c2f33;">
		<div class="row" style="width: auto;">
			<div class="col-5">
	  			<img class="img-fluid" src="images/logo.png" align="right" width="30%">
	  		</div>

			<div class="col-4" style="text-align: left;">
		  		<div class="index_title">
		  				GYT-sama
		  		</div>
		  		<div class="index_subtitle">
		  				Discuss freely, Give your opinion, unban Hax$ 
		  		</div>
		  	</div>

		  	<div class="col-3" style="position: static;">
		  		<?php if(!isset($_SESSION['auth'])){ ?>
				<div align="right" class="index_links">
					<a href="signup.php">Sign Up</a> / <a href="login.php">Log in</a>&nbsp&nbsp&nbsp
				</div>
			<?php } ?>
			<?php if(isset($_SESSION['auth'])){ ?>
			<div>
			<p>Connected !</p>
		</div>
			<?php } ?>
	
		  	</div>

	  	</div>
  </div>



			<?php if(!isset($_SESSION['auth'])){ ?>
				<div align="right" class="index_links" style="margin: -10px;">
					<a href="signup.php">Sign Up</a> / <a href="login.php">Log in</a>&nbsp&nbsp&nbsp
				</div>
			<?php } ?>
			<?php if(isset($_SESSION['auth'])){ ?>
			<div>
			<p>Connected !</p>
		</div>
			<?php } ?>
	



</body>
<footer>
	<a href="actions/logoutAction.php">Click here to Log out</a>
</footer>
</html>