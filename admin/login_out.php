<?php 
session_start();   
session_destroy();   
echo "<script language=javascript>alert('已经退出登陆！');location='index.php';</script>";
?>