<?php 
require("session_inside.php");
require("../conn.php");
$addtime=date("Y-m-d H:m:s",time());
$conn=mysql_open(); 
if ($_GET['action']=='choice'){
$bcurl='add.php';
$sql="insert into co_exam_choice(question,a,b,c,d,answer,operater,addtime) values('".$_POST["question"]."','".$_POST["choice_a"]."','".$_POST["choice_b"]."','".$_POST["choice_c"]."','".$_POST["choice_d"]."','".$_POST["answer"]."','".$_SESSION['admin_user']."','".$addtime."')";}
elseif ($_GET['action']=='period'){
$bcurl='add_period.php';
$sql="insert into co_exam_period(title,num,score,addtime) values('".$_POST["title"]."','".$_POST["num"]."','".$_POST["score"]."','".$addtime."')";
}
elseif ($_GET['action']=='setting_title'){
$bcurl='main.php';
		$sql="update co_exam_adminuser set title='".$_POST["title"]."',title2='".$_POST["title2"]."'";
}
elseif ($_GET['action']=='setting_period'){
$bcurl='main.php';
		$sql="update co_exam_adminuser set this='".$_POST["this"]."'";
}else{
	echo "<script language=javascript>console.log('error!');</script>";
}
$result=mysql_query($sql);
mysql_close($conn);
echo "<script language=javascript>alert('添加成功!');location='$bcurl';</script>"; 
function filter($var){if($var == '') {return false; } return true; } 
?>