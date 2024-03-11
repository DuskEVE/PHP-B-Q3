<?php
include_once "./db.php";

if($Order->count($_GET)){
    $orders = $Order->searchAll($_GET);
    $seats = [];
    foreach($orders as $order){
        $seat = explode(",", $order['seat']);
        $seats = array_merge($seats, $seat);
    }

    echo json_encode($seats);
}
else echo "{}";
?>