<?php

require('database.php');

//sign-in validation
if(isset($_POST['validate'])){

	//check if fields are not empty
	if(!empty($_POST['pseudonym']) AND !empty($_POST['first_name']) AND !empty($_POST['last_name']) AND !empty($_POST['password'])){

		//user infos assigned from fields to variables
		$user_pseudonym = htmlspecialchars($_POST['pseudonym']);
		$user_first_name = htmlspecialchars($_POST['first_name']);
		$user_last_name = htmlspecialchars($_POST['last_name']);
		$user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		//check if pseudonym not already taken
		$checkIfPseudonymAlreadyTaken = $dtb->prepare('SELECT pseudonym FROM users WHERE pseudonym = ?');
		$checkIfPseudonymAlreadyTaken->execute(array($user_pseudonym));

		//if pseudonym not taken
		if($checkIfPseudonymAlreadyTaken->rowCount() == 0){
			
			//insert infos in database
			$insertUser = $dtb->prepare('INSERT INTO users(first_name,last_name,pseudonym,password) VALUES(?, ?, ?, ?)');
			$insertUser->execute(array($user_first_name, $user_last_name, $user_pseudonym, $user_password));

			//get infos of the user
			$GetInfoUserReq = $dtb->prepare('SELECT id, first_name, last_name, pseudonym FROM users WHERE pseudonym = ?');
			$GetInfoUserReq->execute(array($user_pseudonym));

			$UserInfos = $GetInfoUserReq->fetch();

			//authentification of user
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $UserInfos['id'];
			$_SESSION['first_name'] = $UserInfos['first_name'];
			$_SESSION['last_name'] = $UserInfos['last_name'];
			$_SESSION['pseudonym'] = $UserInfos['pseudonym'];

			//redirect user to the index.php page
			header("Location: index.php", true);

		}else {
			//error
			$errormsg = "User pseudonym already taken";
		}

	}else {
		//error
		$errormsg = "Please fill in all fields";
	}

}

?>
