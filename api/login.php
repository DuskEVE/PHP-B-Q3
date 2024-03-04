<?php
include_once "./db.php";
if($_POST['user']=='admin' && $_POST['password']=='1234'){
    $_SESSION['user']='admin';
    header("location:../admin.php");
}
else header("location:../admin.php?error=1");
?>