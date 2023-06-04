<?php
require('database.php');
require('getpostwhithin24hAction.php');

$of2 = array("name" => "Wakrain", "num" => $get24_2, "link" => "threads/wakrain.php");
$of3 = array("name" => "Donald Trump", "num" => $get24_3, "link" => "threads/donaldtrump.php");
$of69 = array("name" => "Furry", "num" => $get24_69, "link" => "threads/furry.php");

$all_thread_with_popularity = array($of2,$of3,$of69);

 function sortByNum($a, $b) {
    return strcasecmp($b['num'], $a['num']);
  }

usort($all_thread_with_popularity, 'sortByNum');

