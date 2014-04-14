<?php
session_start(); 
$shijian=date("Y-m-d H:i:s", time()) ;
$f=md5($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
$admin_user=$_POST['username'];
$admin_pass=md5($_POST['password']);

require("conn.php");
$conn=mysql_open();
$sql="select 'name','password' from usr where name='".$admin_user."' and password='".$admin_pass."'";
$result=mysql_query($sql);
$num=mysql_num_rows($result);
if ($num>0){
	$_SESSION['admin_user']=$admin_user;
	echo "<script language=javascript>location='setting.php';</script>";
}
else{
   echo "<script language=javascript>alert('账户或者密码错误!');location='index.php';</script>";
}
mysql_close($conn);

?>