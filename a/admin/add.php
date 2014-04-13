<?php 
  $type = 'add';
  require 'header.php';
?>
    <div class="container">
      <div class="messages">
        <h1>添加模式<span class="icon icon-arrow-down"></span></h1>
        <ul class="message-list">
            <form id="form1" name="form1" method="post" action="post2mysql.php?action=choice" onsubmit="return form1_onsubmit()">
                <p class="inp">问题 :<input name="question" type="text" class="form-control" size="80" maxlength="100" required="required" /></p>
                <p class="inp">选项A:<input name="choice_a" type="text" class="form-control" size="40" maxlength="100" required="required" /></p>
                <p class="inp">选项B:<input name="choice_b" type="text" class="form-control" size="40" maxlength="100" required="required" /></p>
                <p class="inp">选项C:<input name="choice_c" type="text" class="form-control" size="40" maxlength="100" required="required" /></p>
                <p class="inp">选项D:<input name="choice_d" type="text" class="form-control" size="40" maxlength="100" required="required" /></p>
                <p><input type="submit" name="Submit" class="btn btn-primary q_submit" value="添加试题"/></p>
  </form>
          </li>
        </ul>
      </div>
<?php 
  require 'footer.php';
?>
