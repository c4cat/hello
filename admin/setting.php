<?php 
  require 'header.php';
?>
<!-- 4 not html5 -->
    <div class="container">
      <div class="messages">
        <h1>设定</h1>
        <ul class="message-list">
          <form id="form1" name="form1" method="post" action="post2mysql.php?action=update">
                <p>温度:<input name="tmp" type="num" class="form-control" size="20" required='required' placeholder='请填入默认的亮度'/></p>
                <p>亮度:<input name="light" type="num" class="form-control" size="20" required='required' placeholder='请填入默认的温度'/></p>
                <p class="inp"><label>开关状态</label></p>
                <input id="open" type="radio" name="swi" value="1" checked="checked"><label for="open">开</label>
                <input id="close" type="radio" name="swi" value="0"><label for="close">关</label>
                </p>
                <p><input type="submit" name="Submit" class="btn btn-primary q_submit" value="保存"/></p>
          </form>
          </li>
        </ul>
      </div>
<?php 
  require 'footer.php';
?>
