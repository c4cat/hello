<?php
function mysql_open(){
$db_host='localhost';
$db_user='root';
$db_pass='123';
$db_name='content';
$conn=mysql_connect($db_host,$db_user,$db_pass); 
mysql_query("set names utf-8");
mysql_select_db($db_name,$conn);
return $conn;
}
?>