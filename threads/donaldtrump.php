<!DOCTYPE html>
<html lang="en">
<?php 
include '../includes/head.php'; 

//definition of the thread id
$thread_id = 3;
?>

<body>

	<!-- title -->
	<h1 style="color: whitesmoke; padding: 30px; font-size: 80px;">
		<center><br>._. Donald Trump President ? ._.</center>
	</h1>

	<!-- link to action files -->
	<?php require('../actions/showallpostsAction.php'); ?>
	<?php require('../actions/postopinionAction.php'); ?>
	<?php require('../actions/deletepostAction.php'); ?>

	</form>
	<br><br>
	
	<!-- display every posts in cards with a loop -->
	<?php
		while($post = $getall_posts->fetch()){
		?>
			<div class="container">
				<div class="card mb-3" style="max-height: 1000px; background-color: #b5aea5;">
					<font color="whitesmoke">
				  	<div class="row">
				  		
				  		<!-- image source to display the image the user has chosen -->
				  		<div class="col-4">
				    		<center><img src="../images/logo.png" style="max-width: 200px; max-height: 200px; margin: 20px ;"></center>
						</div>

						<!-- display of the card body -->
				    	<div class="col-3" style="margin: 0px; width: auto;">
				      		<div class="card-body">

				      			<!-- display of the infos on the card being : post id, time sent, thread id with the display of a ADMIN red tag when the message is sent by high permission -->
						        <p>
						        	<?php if($post['perm'] ==	 10){?>
						        		<font color="red"><b>ADMIN</b></font> 
						        <?php } ?> 
						        	ID : <?= $post['id'];?>, Sent at <?= $post['time_stamp']; ?> 
						        	On thread n°<?= $post['thread_id']; ?>
						        	<br>
						        </p>

						        <!-- possibility for admin to delete any message -->
						        <?php if($_SESSION['perm'] == 10){ ?>
						        <form method="POST">
						        <div align="right">
						        	<button name="delete_comment" value="<?= $post['id'];?>">
						        		Delete Comment
						        	</button>
						        </div>
						    	</form>
						    	<?php } ?>

						    	<!-- display of content -->
						        <p class="fs-4" <?php if($post['perm'] =! 10){ ?> style="max-width: 300px;" <?php } ?>>
						        	<?= $post['content']; ?>
						        </p>
				    		</div>
				  		</div>
					</div>

					<!-- footer of the card displaying for which side you are -->
					<div class="card-footer" style="height: 6px; margin: -1px; background-color:
						    	<?php

						    		//Color chose by the table variable 'user_yesorno'
						    		if($post['user_yesorno'] == 0){echo "red"; $last_yesorno = 0;}else{echo "green"; $last_yesorno = 1;}
						    	?>
						    	; ">
				      			</div>
				    </font>
				</div>
			</div>
				<?php
		}
	?>
	<br><br>

	<!-- post the opinion on the subject -->
	<section class="container">

		<form class="form_group" method="POST">	
		
		<!-- to send all the data that is needed you have a textarea to have the content of the message, a load image button to import images, a radio button to tell on which side you are -->
		<div align="left">	
			<label>Your Opinion :<br><br></label>
			<textarea name="UserOpinion" class="form-control" style="width: 70%;"></textarea>
			<br>

			<!-- input file to import images connected to a javascript event -->
			<input type="file"  accept="image/gif, image/jpeg, image/png" name="image" onchange="loadFile(event)" id="file" style="display: none;">

			<p><label for="file" style="cursor: pointer;" class="fs-5">Upload Image</label></p>
			<img id="output" width="200" />

			<!-- display the image on the site as a preview -->
			<script>
				var loadFile = function(event) {
					var image = document.getElementById('output');
					image.src = URL.createObjectURL(event.target.files[0]);
				}
			</script>

		</div>

		<!-- radio buttons to select the side -->
		<div class="btn-group" role="group" aria-label="Basic radio toggle button group">
			<input type="radio" class="btn-check" name="btnradio1" id="btnradio1" autocomplete="off" value="1" <?php if($last_yesorno == 1){ ?>checked <?php } ?>>
			<label  class="btn btn-outline-success" for="btnradio1">I am for the subject</label> 
			<input type="radio" class="btn-check" name="btnradio1" id="btnradio2" autocomplete="off" value="0" <?php if($last_yesorno == 0){ ?>checked <?php } ?>>
			<label  class="btn btn-outline-danger" for="btnradio2">I am against the subject</label>
		</div>	
		<br><br><br>
		<div>
			<button name="validate_user_opinion" class="btn btn-primary" type="btn">Give your opinion on the subject</button>
		</div>

		</form>

	</section>

<!-- error message display -->
<?php if(isset($errormsg)){echo "<p>" .$errormsg. "</p>" ;} ?>

</body>
<footer>
	<br><br><br>

	<!-- Return to mainpage button -->
	<a href="../index.php">Retour à la page principale</a>
</footer>
</html>