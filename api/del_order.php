<?php
include_once "./db.php";
if(isset($_POST['id'])) $Order->delete($_POST);
else{
    $Order->delete([$_POST['key']=>$_POST['value']]);
    // echo json_encode([$_POST['key']=>$_POST['value']]);
}
?>