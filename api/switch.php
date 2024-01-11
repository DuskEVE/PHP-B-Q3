<?php
include_once "db.php";
$DB = new myDB('localhost', 'utf8', 'db15_3', 'root', '', $_POST['table']);
$now = $DB->search(['id'=>$_POST['now']]);
$to = $DB->search(['id'=>$_POST['to']]);

$temp = $now['rank'];
$now['rank'] = $to['rank'];
$to['rank'] = $temp;

$DB->update($now);
$DB->update($to);
?>