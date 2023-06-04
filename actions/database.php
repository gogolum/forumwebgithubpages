<?php 

try {

	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	$dtb = new PDO("mysql:host=localhost;dbname=furrhome;charset=utf8", "root", "");

} catch (Exception $e) {
	
	die('Error was detected :' . $e->getMessage());


}

