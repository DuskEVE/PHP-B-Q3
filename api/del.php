<?php
include_once "./db.php";
$DB = new myDB('localhost', 'utf8', 'db15_3', 'root', '', $_POST['table']);
$DB->delete(['id'=>$_POST['id']]);
?>