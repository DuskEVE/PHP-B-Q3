<?php
  include_once "./api/db.php";
  $error = "";

  if(!empty($_POST)){
    if($_POST['user']=='admin' && $_POST['password']==1234) $_SESSION['login'] = $_POST['user'];
    else $error = "帳號或密碼錯誤!";
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0055)?do=admin -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>影城</title>
<link rel="stylesheet" href="./css/css.css">
<script src="./js/jquery-1.9.1.min.js"></script>
</head>

<body>
<div id="main">
  <div id="top" style=" background:#999 center; background-size:cover; " title="替代文字">
    <h1>ABC影城</h1>
  </div>

  <div id="top2"> 
    <a href="./index.php">首頁</a> 
    <a href="./index.php?do=intro">線上訂票</a> 
    <a href="#">會員系統</a> 
    <a href="./admin.php">管理系統</a> 
  </div>

  <div id="text"> <span class="ct">最新活動</span>
    <marquee direction="right">
    ABC影城票價全面八折優惠1個月
    </marquee>
  </div>

  <div id="mm">
    <?php
    if(isset($_SESSION['login'])){
    ?>
    <div class="ct a rb" style="position:relative; width:101.5%; left:-1%; padding:3px; top:-9px;"> 
      <a href="?do=title">網站標題管理</a>| 
      <a href="?do=go">動態文字管理</a>| 
      <a href="?do=poster">預告片海報管理</a>| 
      <a href="?do=movie">院線片管理</a>| 
      <a href="?do=order">電影訂票管理</a> 
    </div>

    <div class="rb tab">
      <?php
        // $do = ['main'];
        // if(isset($_GET['do']) && in_array($_GET['do'], $do)) include "./back/{$_GET['do']}.php";
        // else include "./back/main.php";
        $do = (isset($_GET['do'])? $_GET['do']:"main");
        $file = "./back/$do.php";
        if(file_exists($file)) include $file;
        else include "./back/main.php";
      ?>
    </div>

    <?php
    }
    else{
    ?>
    <form action="" method="post" style="width: 100%; text-align: center;">
    <?php
    if(strlen($error) > 0) echo "<div style='color:red;'>$error</div>"
    ?>
      <table style="width: 40%; margin:auto">
        <tr>
          <td><label for="user">帳號:</label></td>
          <td><input type="text" name="user" id="user"></td>
        </tr>
        <tr>
          <td><label for="password">密碼:</label></td>
          <td><input type="password" name="password" id="password"></td>
        </tr>
      </table>
      <div><input type="submit" value="登入"></div>
    </form>
    <?php
    }
    ?>
  </div>

  <div id="bo"> ©Copyright 2010~2014 ABC影城 版權所有 </div>

</div>
</body>
</html>