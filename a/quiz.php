<?php 
    require('header.php');
    require("conn.php");
	$conn=mysql_open();
	$a="select COUNT(*) AS count from co_exam_score a,co_exam_adminuser b where a.memberid= '".$uid."' and a.period = b.this";
	$b=mysql_fetch_array(mysql_query($a)); 
	$c=$b['count'];
	if($c > 0){
		$intro ="intro.php?mk=".$mk;
    	echo "<script language='javascript' type='text/javascript'>";  
    	echo "alert('你已经做过本期测试!!请期待下一期测试');";  
   		echo "window.location.href='$intro';";
    	echo "</script>";  
	}
?>
<link rel="stylesheet" href="public/css/anythingslider.css">     
<style>
	#slider { width: 517px; min-height: 217px; }
</style>
			 <section id="posts" class="content clearfix  avatar-style-circle">
                <div>
                    <article class="text not-page">
                        <div class="post-wrapper clearfix">
                            <section class="post">
                                <div class="body-text intro">
									<?php
										// filter null in array
										function filter($var){if($var == '') {return false; } return true; }
										// get the question
										$q="select a.choose from co_exam_period a,co_exam_adminuser b where a.id=b.this";
										$p=mysql_query($q);
										$getChoose=mysql_fetch_row($p);
										$arr = $getChoose[0];
										$arr = explode(',',$arr,-1);
										$arr = array_filter($arr,"filter");
										$c_arr = count($arr);
										$arr=implode(",",$arr);   
										// $query="select a.* from co_exam_choice a,co_exam_period b where id in ($arr)";
										$query="select * from co_exam_choice where id in ($arr)";
										$result=mysql_query($query);
										$num=0;
										echo '<form id="form1" name="form1" method="post" action="get_result.php?action=check_and_get_answer&mk='.$mk.'&numofq='.$c_arr.'" >';
										?>
										<ul id="slider">
										<?php 
										while($rs=mysql_fetch_object($result)){
  											$num++;
  											echo "<li><div>";

											echo "<a name='c$num'></a><span class='t'>题目$num . $rs->question</span><br /><input type='hidden' name='id$num' value='$rs->id' /><p></p>";
											echo "<p><input type='radio' name='$num' id='$rs->id' value='A' /> A . $rs->a <br></p>";
											echo "<p><input type='radio' name='$num' id='$rs->id' value='B' /> B . $rs->b <br></p>";
											echo "<p><input type='radio' name='$num' id='$rs->id' value='C' /> C . $rs->c <br></p>";
											echo "<p><input type='radio' name='$num' id='$rs->id' value='D' /> D . $rs->d <br></p>";
											echo "</div></li>";
										}
										mysql_close($conn);
										?>
										</ul>
										<p class='count'>(请在<span id='dd'>30</span>秒内作答)</p>
										<input name="Submit" value="提交" type="submit" class='btn jj'/>
									</form>
                                </div>
                            </section>
                        </div>
                    </article>
                </div>
            </section>        
<?php 
    require('footer.php');
?>        
<script src="public/js/jquery.anythingslider.min.js"></script>   
<script type='text/javascript'>
	$(function(){
			$('#slider').anythingSlider({
				// enableArrows:false,
				enableKeyboard:false,
				enableStartStop:false,
				enableNavigation :false,
				autoPlay:false,
				stopAtEnd:true,
				pauseOnHover:false,
				hashTags:false,
				infiniteSlides:false,
				forwardText:"下一题",
			});
		});

function run(){
    var s = document.getElementById("dd");
    var b = $('.activePage').find('input').attr('disabled');

    if(s.innerHTML == 0 && !b){
        alert('啊哦,时间到了,请选择下一题');
        $('.activePage').find('input').attr('disabled',true);
        // clearInterval(a);
        return false;
    }
    if(!b){
    	s.innerHTML = s.innerHTML * 1 - 1;
    }

}

var s=30,t;

function times(){
s = document.getElementById("dd").innerHTML;

b = $('.activePage').find('input').attr('disabled');
t = setTimeout('times', 1000);
s--;
if(s > 0){
	document.getElementById("dd").innerHTML = s;
}else{
	if(!b){
	alert('啊哦,时间到了,请选择下一题!');
	// alert(b);
    $('.activePage').find('input').attr('disabled',true);
    document.getElementById("dd").innerHTML = 0;
    }
}

}

window.setInterval("times()",1000);

var a=window.setTimeout("run()", 30000);

$(function(){
$('.forward').click(function(){
	clearTimeout(a);
	$('#dd').html('30');
	var a=window.setTimeout("run()", 30000);
	if($('.panel:eq(-2)').hasClass('activePage')){
		$('.jj').css('opacity',1);
	}
});

});
</script>           