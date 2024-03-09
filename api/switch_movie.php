<?php
include_once "./db.php";
$current = $Movie->search(['id'=>$_GET['id']]);
$target = $Movie->search(['id'=>$_GET['target']]);

$temp = $target['no'];
$target['no'] = $current['no'];
$current['no'] = $temp;
$Movie->update($current);
$Movie->update($target);
?>