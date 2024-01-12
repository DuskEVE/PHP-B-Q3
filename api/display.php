<?php
include_once "db.php";

$data = $Movie->search(['id'=>$_POST['id']]);
$data['display'] = ($data['display']==1? 0:1);
$Movie->update($data);
?>