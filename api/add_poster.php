<?php
include_once "./db.php";

if(!empty($_FILES['file']['name'])){
    move_uploaded_file($_FILES['file']['tmp_name'], "../img/{$_FILES['file']['name']}");
    $_POST['img'] = $_FILES['file']['name'];
}

if($Poster->count() == 0) $_POST['no'] = 1;
else{
    $last = $Poster->searchAll([], 'order by `id` desc limit 1');
    $_POST['no'] = $last[0]['id'] + 1;
}
$_POST['display'] = 1;
$Poster->update($_POST);

header("location:../admin.php?do=poster");
?>