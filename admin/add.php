<?php 
  $type = 'add';
  require 'header.php';
?>
    <div class="container">
      <div class="messages">
        <h1>添加模式<span class="icon icon-arrow-down"></span></h1>
        <ul class="message-list">
            <form id="form1" name="form1" method="post" action="post2mysql.php" onsubmit="return form1_onsubmit()">
                <p class="inp"><label for="addmode-name">模式名称</label><input id="addmode-name" name="addmode-name" type="text" placeholder=" " class="form-control"></p>
                <p class="inp"><label for="addmode-tmp">默认温度</label><input id="addmode-tmp" name="addmode-tmp" type="text" placeholder=" " class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"></p>
                <p class="inp"><label for="addmode-light">默认亮度</label><input id="addmode-light" name="addmode-light" type="text" placeholder=" " class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
                <p class="inp"><label>开关状态</label></p>
                <input id="addmode-open" type="radio" name="addmode-swi" value="1" checked='checked'><label for="addmode-open">开</label>
                <input id="addmode-close" type="radio" name="addmode-swi" value="0"><label for="addmode-close">关</label>
                </p>
                <p><input type="submit" name="Submit" class="btn btn-primary q_submit" value="添加试题"/></p>
            </form>
          </li>
        </ul>
      </div>
<?php 
  require 'footer.php';
?>
