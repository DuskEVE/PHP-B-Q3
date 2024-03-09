<?php
include_once "./db.php";
$movie = $Movie->search(['id'=>$_GET['id']]);
if($movie['display'] == 1){
    $movie['display'] = 0;
    echo "顯示";
}
else{
    $movie['display'] = 1;
    echo "隱藏";
}
$Movie->update($movie);
?>