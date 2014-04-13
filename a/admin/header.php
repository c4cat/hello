<?php 
ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>后台</title>
  <link rel="stylesheet" href="css/style2.css">
  <style type="text/css">
  body,td,th {
	font-family: "Open Sans", sans-serif;
}
  </style>
  <script src="js/prefixfree.min.js"></script>
  <script language="JavaScript">
  <!-- function suredo(src,q) {var ret; ret = confirm(q); if(ret!=false)window.location=src; } //-->
  </script>
</head>
<body>
  <div class="container app">
  <aside class="sidebar">
    <h1 class="logo">
      <a href="#">后台</a>
    </h1>
    <nav class="main-nav">
      <ul>
        <li><a href="setting.php">设置</a></li>
        <li class="active">
          <ul>
            <li class="<?php if($type=="modelist"){echo("active");} ?>"><a href="modelist.php?page=0">模式管理</a></li>
            <li class='<?php if($type=="add"){echo("active");} ?>'><a href="add.php">添加模式</a></li>
            <li class='<?php if($type=="p_add"){echo("active");} ?>'><a href="add_period.php">查询</span></a></li>
          </ul>
        </li>
        <li><a href="#">简单说明</a></li>
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