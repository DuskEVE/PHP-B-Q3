<?php
include_once "./db.php";
foreach($_POST['id'] as $index=>$id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $Poster->delete(['id'=>$id]);
        continue;
    }
    $poster['id'] = $id;
    $poster['name'] = $_POST['name'][$index];
    if(isset($_POST['display']) && in_array($id, $_POST['display'])) $poster['display'] = 1;
    else $poster['display'] = 0;

    $Poster->update($poster);
}

header("location:../admin.php?do=poster");
?>