<?php
require("session_inside.php");
require("conn.php");
$conn=mysql_open();
$id=$_GET['id'];

$q="select * from demo where id = ".$id;
$rs = mysql_fetch_row(mysql_query($q));


$query="update current set name='".$rs[1]."',tmp='".$rs[2]."',light='".$rs[3]."',open='".$rs[4]."' where id=1";
$bcurl='check.php';
// $bcurl='modelist.php?page=0';
$result=mysql_query($query);

mysql_close($conn);

echo "<script language=javascript>alert('选择成功！');location='$bcurl';</script>";
?>