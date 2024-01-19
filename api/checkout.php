<?php
include_once "./db.php";

sort($_POST['seats']);
$_POST['seats'] = serialize($_POST['seat']);
$id = $Order->max('id')+1;
$_POST['no'] = date('Ymd').sprintf("%04d", $id);
$Order->update($_POST);
echo $_POST['no'];