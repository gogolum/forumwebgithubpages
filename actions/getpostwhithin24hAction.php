<?php

require('database.php');


$threadou = 2;
$getall_posts_in_24h = $dtb->prepare('SELECT id, thread_id FROM posts WHERE time_stamp between now() - interval 24 hour and now()');

$getall_posts_in_24h->execute();

$total = array();
while($getall_posts_in_24h_data = $getall_posts_in_24h->fetch()){
	$total[] = array(strval($getall_posts_in_24h_data['thread_id']) => $getall_posts_in_24h_data['id']);
}

$get24_69 = 0;
$get24_2 = 0;
$get24_3 = 0;

foreach ($total as $values) {
	foreach ($values as $key => $subvalues) {
		if ($key == 69) {
			$get24_69++;
		}
		if ($key == 2) {
			$get24_2++;
		}
		if ($key == 3) {
			$get24_3++;
		}
	}
}




