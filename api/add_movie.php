<?php
include_once "./db.php";

if(isset($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'], "../img/{$_FILES['trailer']['name']}");
    $_POST['trailer'] = $_FILES['trailer']['name'];
}
if(isset($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
    $_POST['poster'] = $_FILES['poster']['name'];
}

$_POST['ondate'] = "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}";
unset($_POST['year'], $_POST['month'], $_POST['day']);
$_POST['display'] = 1;
$_POST['rank'] = $Movie->max('id')+1;

$Movie->update($_POST);
header("location:../admin.php?do=movie");
?>