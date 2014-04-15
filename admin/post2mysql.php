<?php 
require("session_inside.php");
require("conn.php");
$addtime=date("Y,m,d",time());

$conn=mysql_open();
$type = $_GET['action'];

if($type == 'add'){
	$bcurl='modelist.php?page=0';
	$sql="insert into demo(name,tmp,light,open,date) values('".$_POST["addmode-name"]."','".$_POST["addmode-tmp"]."','".$_POST["addmode-light"]."','".$_POST["addmode-swi"]."','".$addtime."')";
}elseif ($type == 'update') {
	$bcurl='check.php';
	$sql="update current set name='默认',tmp='".$_POST["tmp"]."',light='".$_POST["light"]."',open='".$_POST["swi"]."' where id=1";
}
$result=mysql_query($sql);

mysql_close($conn);
echo "<script language=javascript>alert('成功!');location='$bcurl';</script>"; 
function filter($var){if($var == '') {return false; } return true; } 
?>