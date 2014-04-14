<?php 
  require 'header.php';
?>
<!-- 4 not html5 -->
    <div class="container">
      <div class="messages">
        <h1>设定</h1>
        <ul class="message-list">
          <form id="form1" name="form1" method="post" action="post2mysql.php?action=setting_title">
                <p>温度:<input name="tmp" type="num" class="form-control" size="20" required='required' placeholder='请填入默认的亮度'/></p>
                <p>亮度:<input name="light" type="num" class="form-control" size="20" required='required' placeholder='请填入默认的温度'/></p>
                <p class="inp"><label>开关状态</label></p>
                <input id="addmode-open" type="radio" name="addmode-swi" value="1" checked="checked"><label for="addmode-open">开</label>
                <input id="addmode-close" type="radio" name="addmode-swi" value="0"><label for="addmode-close">关</label>
                </p>
                <p><input type="submit" name="Submit" class="btn btn-primary q_submit" value="保存"/></p>
          </form>
          </li>
        </ul>
      </div>
<?php 
  require 'footer.php';
?>
