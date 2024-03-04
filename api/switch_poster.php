<?php
include_once "./db.php";
$current = $Poster->search(['id'=>$_GET['id']]);
$target = $Poster->search(['id'=>$_GET['target']]);

$temp = $target['no'];
$target['no'] = $current['no'];
$current['no'] = $temp;
$Poster->update($current);
$Poster->update($target);
?>