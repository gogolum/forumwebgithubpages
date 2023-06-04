<?php

require('actions/database.php');

//sign-in validation
if(isset($_POST['validate'])){

	//check if fields are not empty
	if(!empty($_POST['pseudonym']) AND !empty($_POST['password'])){

		//user infos assigned from fields to variables
		$user_pseudonym = htmlspecialchars($_POST['pseudonym']);
		$user_password = htmlspecialchars($_POST['password']);

		//check if User has an existing pseudonym, get its infos
		$checkIfUserExist = $dtb->prepare('SELECT * FROM users WHERE pseudonym = ?');
		$checkIfUserExist->execute(array($user_pseudonym));

		//if user has existing pseudonym
		if($checkIfUserExist->rowCount() > 0){

			$UserInfos = $checkIfUserExist->fetch();
			
			//check if user's password is correct
			if(password_verify($user_password, $UserInfos['password'])){

			//authentification of user
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $UserInfos['id'];
			$_SESSION['first_name'] = $UserInfos['first_name'];
			$_SESSION['last_name'] = $UserInfos['last_name'];
			$_SESSION['pseudonym'] = $UserInfos['pseudonym'];
			$_SESSION['perm'] = $UserInfos['perm'];

			//redirect user to the index.php page
			header("Location: index.php", true);
			
			}
			else {
				$errormsg = "Pseudonym or Password is incorrect";
			}

		} else {
			$errormsg = "Pseudonym or Password is incorrect";
		}

	}else {
		//error
		$errormsg = "Please fill in all fields";
	}

}