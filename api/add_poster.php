<?php
include_once "./db.php";

if(isset($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'], "../img/{$_FILES['poster']['name']}");
    $_POST['img'] = $_FILES['poster']['name'];
}
$_POST['display'] = 1;
$_POST['rank'] = $Poster->max('id') + 1;
$_POST['ani'] = random_int(1, 3);

$Poster->update($_POST);
header("location:../admin.php?do=poster");
?>