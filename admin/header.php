<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>DEMO</title>
  <link rel="stylesheet" href="css/style2.css">
  <script src="js/prefixfree.min.js"></script>
  <script language="JavaScript">
  <!-- function suredo(src,q) {var ret; ret = confirm(q); if(ret!=false)window.location=src; } //-->
  </script>
</head>
<body>
  <div class="container app">
  <aside class="sidebar">
    <h1 class="logo">
      <a href="../admin">&nbsp;</a>
    </h1>
    <nav class="main-nav">
      <ul>
        <li><a href="setting.php">默认情景设定</a></li>
        <li class="active">
          <ul>
            <li class="<?php if($type=="modelist"){echo("active");} ?>"><a href="modelist.php?page=0">情景模式管理</a></li>
            <li class='<?php if($type=="add"){echo("active");} ?>'><a href="add.php">添加情景模式</a></li>
            <li class='<?php if($type=="check"){echo("active");} ?>'><a href="check.php">查询当前设定</span></a></li>
          </ul>
        </li>
        <li><a href="intro.php">查看简单说明</a></li>
        <!-- <li><a href="#">Stats</a></li> -->
      </ul>
    </nav>
  </aside>
  <div class="main">
    <header class="header">
      <nav class="nav-settings">
        <ul>
          <li><a href="login_out.php">登出</a></li>
          <!-- <li><a href="#" class="icon icon-gear"></a></li> -->
        </ul>
      </nav>
      <div class="clr"></div>
    </header>