<?php
include_once "./db.php";
if(isset($_POST['seat'])){
    $seat = join(",", $_POST['seat']);
    $_POST['seat'] = $seat;
}
$no = 1;
if($Order->count() > 0) $no = $Order->searchAll([], "order by `id` desc limit 1")[0]['id'] + 1;
$_POST['no'] = date('Ymd').sprintf('%04d', $no);
$Order->update($_POST);

$order = $Order->search($_POST);
header("location:../index.php?do=result&id={$order['id']}");
?>