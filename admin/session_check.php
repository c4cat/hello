<?php
session_start();
if(!isset($_SESSION['admin_user']))
{
echo "<script language=javascript>alert('xx');location='index.php';</script>";
}
?>