<?php 
    require('header.php');
?>                   
			 <section id="posts" class="content clearfix  avatar-style-circle">
                <div>
                    <article class="text not-page">
                        <div class="post-wrapper clearfix">
                            <section class="post">
                                <div class="body-text intro">
                                    <h4>欢迎参加懂球帝试卷,您的累计积分将可以获得正品球衣,围巾和马克杯等奖品.</h4>
                                    <p></p>
									<p>懂球帝排行榜</p>
										<table>
										<tr>
											<td></td>
											<td class='no2'></td>
											<td>用户</td>
											<td>本期得分</td>
											<td>平均分</th>
										</tr>
											<?php 
											require("conn.php");
											$conn=mysql_open();
											$query="select * from co_exam_member order by average desc limit 3";
											// $query="select * from co_exam_score where memberid = 1 and period=2";
											$result=mysql_query($query);
											$num = 1;
											$query3="select a.*,c.average from co_exam_score a,co_exam_adminuser b,co_exam_member c where a.memberid = '".$uid."' and a.period=b.this and a.memberid = c.apid";
											$result3=mysql_query($query3);
											$rs3=mysql_fetch_object($result3);
											
											while($rs=mysql_fetch_object($result)){
													echo('<tr>');
													echo('<td>'.$num.'</td>');
													echo('<td class="no2"><img src="'.$rs->img.'" alt="" /></td>');
													echo('<td>'.$rs->username.'</td>');
													echo('<td>'.$rs->new.'</td>');
													// echo('<td>-</td>');
													echo('<td>'.$rs->average.'</td>');
													echo('</tr>');
													$num++;
												}
											?>
											<tr>
												<td>-</td>
												<td class="no2"><img src="" alt="" /></td>
												<td>你</td>
												<td><?php if($rs3){echo($rs3->score);}else{echo('-');} ?></td>
												<td><?php if($rs3){echo($rs3->score);}else{echo('-');} ?></td>

											</tr>
										</table>
										<div><a href="quiz.php?mk=<?php echo($mk); ?>" class='btn'>开始答题</a></div>
                                </div>
                            </section>
                        </div>
                    </article>
                </div>
            </section>
<?php 
    require('footer.php');
?>        