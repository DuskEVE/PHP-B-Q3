<?php
include_once 'db.php';
$movie = $_GET['movie'];
$movieName = $Movie->search(['id'=>$movie])['name'];
$date = $_GET['date'];
$hour = date('G');
$start = ($hour>=14 && $date==date("Y-m-d"))?7-ceil((24 - $hour) / 2):1;

for($i=$start; $i<=5; $i++){
    $orders = $Order->searchAll(['movie'=>$movieName, 'session'=>$i]);
    $qt = 0;
    if(count($orders) > 0) foreach($orders as $order) $qt += $order['qt'];
    $remain = 20 - $qt;
    echo "<option value='{$sess[$i]}'>{$sess[$i]} 剩餘座位: $remain</option>";
}

?>