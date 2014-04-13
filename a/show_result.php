<?php 
    require('header.php');
    require("conn.php");
    $conn=mysql_open();
	$period= $_GET["period"];
	$id = $_GET["id"];
    $query="select * from co_exam_score where memberid = '$id' and period='$period'";
	$query2="select * from co_exam_score where memberid = '$id'";
	$result=mysql_query($query);
	$rs3=mysql_fetch_object($result);

	$result2=mysql_query($query2);
	while($rs2=mysql_fetch_object($result2)){
		$arr[] = $rs2->score;
	}

	$average =round((array_sum($arr)/count($arr)),1);
	if($mk == 'weibo'){
        $name = $user_message['screen_name'];
    }elseif($mk == 'qq'){
        $name = $uinfo['nickname'];
    }else{
    	$name = 'test';
    }


    $time=date("Y-m-d H:m:s",time());
    $a="select COUNT(*) AS count from co_exam_member where apid='".$uid."'";
    $b= mysql_fetch_array(mysql_query($a)); 
	$c= $b['count'];
	if($c !== 0){
		$sql="replace into co_exam_member (apid,average,username,time,new) values('$uid','$average','$name','$time','".$rs3->score."')";
		// $sql="update co_exam_member set (apid,average,username,time,new) values('$uid','$average','$name','$time','".$rs3->score."')";
		$hey=mysql_query($sql);
	}else{
		$sql="insert into co_exam_member (apid,average,username,time,new) values('$uid','$average','$name','$time','".$rs3->score."')";
		$hey=mysql_query($sql);
	}
?>                   
			 <section id="posts" class="content clearfix  avatar-style-circle">
                <div>
                    <article class="text not-page">
                        <div class="post-wrapper clearfix">
                            <section class="post">
                                <div class="body-text intro">
                                    <h2>最终成绩是<?php echo($rs3->score); ?>分,您是真正的懂球帝!!</h2>
                                    <p class='share'><div class="bshare-custom icon-medium-plus"><div class="bsPromo bsPromo2"></div><a title="分享到QQ空间" class="bshare-qzone"></a><a title="分享到新浪微博" class="bshare-sinaminiblog"></a><a title="分享到人人网" class="bshare-renren"></a><a title="分享到腾讯微博" class="bshare-qqmb"></a><a title="分享到网易微博" class="bshare-neteasemb"></a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=2&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script></p>
										<table>
										<tr>
											<td></td>
											<td class='no2'></td>
											<td>用户</td>
											<td>本期得分</td>
											<td>平均分</th>
										</tr>
											<?php 
											$query="select * from co_exam_member order by average desc limit 3";
											// $query="select * from co_exam_score where memberid = 1 and period=2";
											$result=mysql_query($query);
											$num = 1;
											
											
											while($rs=mysql_fetch_object($result)){
													echo('<tr>');
													echo('<td>'.$num.'</td>');
													echo('<td class="no2"><img src="'.$rs->img.'" alt="" /></td>');
													echo('<td>'.$rs->username.'</td>');
													echo('<td>'.$rs->new.'</td>');
													echo('<td>'.$rs->average.'</td>');
													echo('</tr>');
													$num++;
												}
											?>
											<tr>
												<td>-</td>
												<td class="no2"></td>
												<td>test</td>
												<td><?php echo($rs3->score); ?></td>
												<td><?php echo($average); ?></td>
											</tr>
										</table>
                                </div>
                            </section>
                        </div>
                    </article>
                </div>
            </section>
<?php 
    require('footer.php');
?>        