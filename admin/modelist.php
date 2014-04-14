<?php 
	require 'header.php';
?>
<script language="JavaScript">
function suredo(src,q) {var ret; ret = confirm(q); if(ret!=false)window.location=src; }
</script>
    <div class="container">
      <div class="messages">
        <h1>模式管理<span class="icon icon-arrow-down"></span></h1>
        <ul class="message-list">
        <?php
          require("conn.php");
          require("page.php");
          $conn=mysql_open();

          $query="select  * from demo order by id asc";
          genpage($query,8);
          $result=mysql_query($query);
          $num=mysql_num_rows($result);
          while($rs=mysql_fetch_object($result)){
              echo '<li>';
              ?>
            <a href="javascript:suredo('del.php?id=<?php echo($rs->id);?>','确定删除这个模式?')"><span class="btn btn-primary del">删除</span></a>
            <a href="javascript:suredo('choose.php?id=<?php echo($rs->id);?>','确定选择这个模式?')"><span class="btn btn-primary del">选择</span></a>

            <!-- <a href='javascript:suredo("del.php?id=<?php //echo "$rs->id";?>&type=choice","确定删除?")'>删除</a></span>  -->
            <div class="preview">
              <p><?php echo($rs->name); ?></p>
            </div>
          </li>
          <?php 
          }//end while
          ?>
        </ul>
        <?php 
        	echo "<ul id='thePage'>";
			showpage();
			echo "</ul></div>";
			mysql_close($conn); 
		 ?>
      </div>
    </div>
  </div>
</div>

</body>

</html>