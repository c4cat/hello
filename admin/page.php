<?php
$page = $_GET["page"];

function genpage(&$sql,$page_size=12)
 {
      global $prepage,$nextpage,$pages,$sums;  //out param
      $page = $_GET["page"];
      $eachpage = $page_size;
      $pagesql = strstr($sql," from ");
      $pagesql = "select count(*) as ids ".$pagesql;
      $result = mysql_query($pagesql) or die(mysql_error());
      if($rs = mysql_fetch_array($result)) $sums = $rs[0];
      $pages = ceil(($sums-0.5)/$eachpage)-1;
      $pages = $pages>=0?$pages:0;
      $prepage = ($page>0)?$page-1:0;
      $nextpage = ($page<$pages)?$page+1:$pages;  
      $startpos = $page*$eachpage;
    $sql .=" limit $startpos,$eachpage ";
 }
 //显示分页
function showpage()
{
    global $page,$pages,$prepage,$nextpage,$queryString; //param from genpage function
    $shownum =10/2;
    $startpage = ($page>=$shownum)?$page-$shownum:0;
    $endpage = ($page+$shownum<=$pages)?$page+$shownum:$pages;
    $link = $_SERVER["PHP_SELF"];
   
    // echo "共".($pages+1)."页: "; 
    // echo "<a href=$link?page=0>&nbsp;<<&nbsp;</a>";
    if($startpage>0)
        echo " ... <b><a href=$link?page=".($page-$shownum*2).">?</a></b>";
    for($i=$startpage;$i<=$endpage;$i++)
    {
        if($i==$page)    echo "<li class='live'>".($i+1)."</li> ";
        else        echo " <li><a href=$link?page=$i>".($i+1)."</a></li> ";
    }
    if($endpage<$pages)
        echo "<b><li><a href=$link?page=".($page+$shownum*2).">?</a></li></b> ... ";
    if($page<$pages)
        // echo "<a href=$link?page=$pages>&nbsp;>>&nbsp;</a>";
        echo "";

}
?>

