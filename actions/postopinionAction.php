<?php

require('database.php');


if(isset($_POST['validate_user_opinion'])){

	if(!empty($_POST['UserOpinion'])){
		$user_opinion = nl2br(htmlspecialchars($_POST['UserOpinion']));

		$time_stamp =  date("Y-m-d H:i:s");

		$perm = $_SESSION['perm'];

		$insertUserOpinion = $dtb->prepare('INSERT INTO posts(user_id, thread_id, content, user_yesorno, time_stamp, perm) VALUES (?, ?, ?, ?, ?, ?) ');
		$insertUserOpinion->execute(array($_SESSION['id'], $thread_id, $user_opinion, intval($_POST['btnradio1']), $time_stamp, $perm));
		header("Refresh:0");

	}

}
