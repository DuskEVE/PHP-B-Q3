<?php
include_once "./db.php";

// $today = date('Y-m-d');
// $ondate = date('Y-m-d', strtotime('-2 days'));
// $movies = $Movie->sql("select * from `movie` where `ondate`>='$ondate' && `ondate`<='$today' && `display`=1 order by `rank`");

$ondate = $Movie->search(['id'=>$_GET['id']])['ondate'];
$today = date('Y-m-d');

for($i=0; $i<3; $i++){
    $date = strtotime("+$i days", strtotime($ondate));
    if($date >= strtotime($today)){
        $str = date("Y-m-d", $date);
        echo "<option value='{$str}'>$str</option>";
    }
}

?>