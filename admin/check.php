<?php
  $type = 'check';
	require 'header.php';
?>
<script language="JavaScript">
function suredo(src,q) {var ret; ret = confirm(q); if(ret!=false)window.location=src; }
</script>
    <div class="container">
      <div class="messages">
        <h1>查询当前设定<span class="icon icon-arrow-down"></span></h1>
        <ul class="message-list">
        <?php
          require("conn.php");
          $conn=mysql_open();

          $query="select * from current where id='1'";
          $result=mysql_query($query);
          $num=mysql_num_rows($result);
          while($rs=mysql_fetch_object($result)){
              // echo '<li>';
              ?>
              <li><p>当前模式 : <?php echo($rs->name); ?></p></li>
              <li><p>当前温度 : <?php echo($rs->tmp); ?></p></li>
              <li><p>当前亮度 : <?php echo($rs->light); ?></p></li>
              <li><p>窗帘开关 : <?php if($rs->open==0){echo('关');}else{echo('开');}; ?></p></li>
          <?php 
          }//end while
          ?>
        </ul>

        <?php 
			     echo "</div>";
			     mysql_close($conn); 
		    ?>
      </div>
    </div>
  </div>
</div>

</body>

</html>