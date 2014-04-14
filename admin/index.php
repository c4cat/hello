<?php
ob_start();
session_start();
if(isset($_SESSION['admin_user'])){
  header("Location: setting.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>登陆</title>
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700"> -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
  <script laguage="javascript">
  <!--
  function form1_onsubmit(){
  if (document.myform.username.value==""){
        alert("请输入用户名！")
        document.myform.username.focus()
        return false
       }else if(document.myform.password.value==""){ 
        alert("请输入密码！")
        document.myform.password.focus()
        return false
       }
  }
  -->
  </script>
</head>
<body>
    <div id="login">
        <form onSubmit="return form1_onsubmit()" method="post" action="login_in.php">
            <fieldset class="clearfix">
                <p><input type="text" name='username' value="用户名" onBlur="if(this.value == '') this.value = '用户名'" onFocus="if(this.value == '用户名') this.value = ''" required></p> 
                <p><input type="password"  name='password' value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p>
                <p><input type="submit" value="登陆" name=dosubmit></p>
            </fieldset>
        </form>
        <!-- <p>迷路了? <a href="../">返回首页</a><span class="fontawesome-arrow-right"></span></p> -->
    </div> <!-- end login -->
</body>
</html>