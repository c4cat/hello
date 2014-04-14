<?php 
require("session_inside.php");
require("conn.php");
$addtime=date("Y,m,d",time());

$conn=mysql_open();

echo($_POST["addmode-swi"]);

$bcurl='add.php';
$sql="insert into demo(name,tmp,light,open,date) values('".$_POST["addmode-name"]."','".$_POST["addmode-tmp"]."','".$_POST["addmode-light"]."','".$_POST["addmode-swi"]."','".$addtime."')";
$result=mysql_query($sql);

mysql_close($conn);
echo "<script language=javascript>alert('添加成功!');location='$bcurl';</script>"; 
function filter($var){if($var == '') {return false; } return true; } 
?>