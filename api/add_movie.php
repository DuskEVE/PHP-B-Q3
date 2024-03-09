<?php
include_once "./db.php";

if(!empty($_FILES['poster']['name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
    $_POST['poster'] = $_FILES['poster']['name'];
}
if(!empty($_FILES['movie']['name'])){
    move_uploaded_file($_FILES['movie']['tmp_name'], "../img/{$_FILES['movie']['name']}");
    $_POST['movie'] = $_FILES['movie']['name'];
}
$_POST['date'] = "{$_POST['y']}-{$_POST['m']}-{$_POST['d']}";
unset($_POST['y']);
unset($_POST['m']);
unset($_POST['d']);

if($Movie->count() == 0) $_POST['no'] = 1;
else{
    $last = $Movie->searchAll([], 'order by `id` desc limit 1');
    $_POST['no'] = $last[0]['id'] + 1;
}
$_POST['display'] = 1;

$Movie->update($_POST);
header("location:../admin.php?do=movie");
?>