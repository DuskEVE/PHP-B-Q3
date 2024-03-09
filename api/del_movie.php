<?php
include_once "./db.php";
$Movie->delete(['id'=>$_POST['id']]);
?>