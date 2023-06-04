<?php

require('database.php');

if(isset($_POST['delete_comment'])){

	$id = intval($_POST['delete_comment']);
	$errormsg = $id;

	$delete_user = $dtb->prepare('DELETE FROM posts WHERE id = ?;');
	$delete_user->execute(array($id));
	header('Refresh:0');
}