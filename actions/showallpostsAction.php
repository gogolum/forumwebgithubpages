<?php

require('database.php');

$getall_posts = $dtb->prepare('SELECT id, thread_id, content, user_yesorno, time_stamp, perm FROM posts WHERE thread_id = ? ORDER BY id');
$getall_posts->execute(array($thread_id));
