<?php
require("session_inside.php");
require("../conn.php");
$conn=mysql_open();
$id=$_GET['id'];

$query="delete from demo where id='$id'";
$bcurl='modelist.php?page=0';

$result=mysql_query($query);
mysql_close($conn);

echo "<script language=javascript>alert('删除成功！');location='$bcurl';</script>";
?>