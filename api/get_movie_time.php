<?php
include_once "./db.php";
$seats = ['14:00-16:00', '16:00-18:00', '18:00-20:00', '20:00-22:00', '22:00-24:00'];
$now = date('G', strtotime('+7 hour'));
$today = date('Y-m-d');

foreach($seats as $time){
    $h = explode(":", $time);

    if($_GET['date']==$today && $now>=intval($h[0])) continue;
    $count = 0;
    if($Order->count(['movie_id'=>$_GET['id'], 'date'=>$_GET['date'], 'time'=>$time])>0){
        $orders = $Order->searchAll(['movie_id'=>$_GET['id'], 'time'=>$time]);
        foreach($orders as $order) $count += $order['count'];
    }
    $left = 20 - $count;

    echo "<option value='$time'>$time 剩餘座位 $left</option>";
}
?>