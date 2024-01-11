<?php
include_once "db.php";

foreach($_POST['id'] as $index=>$id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])) $Poster->delete(['id'=>$id]);
    else{
        $data = $Poster->search(['id'=>$id]);
        $data['display'] = (isset($_POST['display']) && in_array($id, $_POST['display']))? 1:0;
        $data['name'] = $_POST['name'][$index];
        $data['ani'] = $_POST['ani'][$index];

        $Poster->update($data);
    }
}

header("location:../admin.php?do=poster");
?>