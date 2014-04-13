<?php
ob_start();
session_start();
//weibo login
include_once( 'libweibo/config.php' );
include_once( 'libweibo/saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
$mk = $_GET['mk'];
//num of question
$arr_l = $_GET['numofq'];
//get login info
if($mk == 'weibo'){
    $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
    $ms  = $c->home_timeline(); // done
    $uid_get = $c->get_uid();
    $uid = $uid_get['uid'];
    $user_message = $c->show_user_by_id($uid);
}elseif($mk == 'qq'){
    $uid = $_SESSION['oid'];
    $uinfo = $_SESSION['uinfo'];
}elseif($mk == 'test'){
    $uid = '12345678';
}
//connect database
require("conn.php");
$conn=mysql_open();
//already done or not,if done jump
$aa="select COUNT(*) AS count from co_exam_score a,co_exam_adminuser b where a.memberid= '".$uid."' and a.period = b.this";
$bb=mysql_fetch_array(mysql_query($aa)); 
$cc=$bb['count'];
// if($cc !== 0){
//     $intro ="intro.php";
//     echo "<script language='javascript' type='text/javascript'>";  
//     echo "alert('你已经做过本期测试!!');";  
//     echo "window.location.href='$intro';";
//     echo "</script>";  
// }
//$i for the title count,$rn is the sum of question
$i=0;
$rn=0;
//correct the question
while ($i<$arr_l){
$i++;

$toans= $_POST["$i"];
$idd= $_POST["id$i"];
$query="select  * from co_exam_choice where id='$idd' ";
$result=mysql_query($query);
$rs=mysql_fetch_object($result);

if ($toans==""){$toans="没有答该题！";}

if ($rs->answer==$toans ){
	$rn++;
// echo "<span class='right'>ur choose correct：$toans  ";
}
if ($rs->answer<>$toans ){
// echo "<span class='worong'>ur choose worng：$toans  ";
}
// echo "</span></div>";
}
// end while;


//count the score
$q="select a.*,b.this from co_exam_period a,co_exam_adminuser b where a.id=b.this";
$p=mysql_query($q);
$r=mysql_fetch_object($p);
$score = $r->score;
$period = $r->this;

$score = $rn*$score;

// echo($score);

//insert into the mysqls
$sql="insert into co_exam_score (memberid,score,period) values('$uid','$score','$period')";
$hey=mysql_query($sql);
mysql_close($conn);

//jump to show result;
$link='location:show_result.php?id='.$uid.'&period='.$period.'&mk='.$mk;
header($link);
?>