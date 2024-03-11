<?php
include_once "./db.php";
$movie = $Movie->search(['id'=>$_GET['id']]);
$today = date('Y-m-d');
$start = explode('-', $today)[2];
$end = explode('-', $movie['date'])[2]+2;

for($i=$start; $i<=$end; $i++){
    $date = date('Y-m-').$i;
    echo "<option value='$date'>$date</option>";
}
?>