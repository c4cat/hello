<?php
function mysql_open(){
$db_host='localhost';
$db_user='qydb275c_f';
$db_pass='900517aa';
$db_name='qydb275c';
$conn=mysql_connect($db_host,$db_user,$db_pass); 
mysql_query("set names utf-8");
mysql_select_db($db_name,$conn);
return $conn;
}
?>