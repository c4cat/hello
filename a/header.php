<?php 
ob_start();
session_start();

include_once( 'libweibo/config.php' );
include_once( 'libweibo/saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
//↑ weibo login
$mk = $_GET['mk'];
if($mk == 'weibo'){
    $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
    $ms  = $c->home_timeline(); // done
    $uid_get = $c->get_uid();
    $uid = $uid_get['uid'];
    $user_message = $c->show_user_by_id($uid);
}elseif($mk == 'qq'){
    $uid = $_SESSION['oid'];
    $uinfo = $_SESSION['uinfo'];
    // echo($oid);
}elseif($mk= 'test'){
     $uid = '12345678';
}else{
    $url ="index.php";
    echo "<script language='javascript' type='text/javascript'>";  
    echo "alert('请先使用qq或者微博登录!!');";  
    echo "window.location.href='$url';";
    echo "</script>";  
}
//↑ get user info , img & name etc   
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="lt-ie10 lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="lt-ie10 lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]><html class="lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
    <head>
        
        <meta charset="UTF-8" />
        <title>懂球帝测试试卷</title>
        <meta property="qc:admins" content="357120767265411637563671" />
        <!-- Theme Defaults -->
        <meta name="Title font" content="Helvetica Neue">
        <meta name="Title font weight" content="bold" title="Bold">
        <meta name="Title font weight" content="normal" title="Normal">
        <meta name="Body font" content="Helvetica Neue">
        <meta name="Background color" content="#f6f6f6">
        <meta name="Title color" content="#444444">
        <meta name="Link color" content="#529ecc">
        <meta name="Header image" content="">

        <meta name="if:Sliding header" content="1">
        <meta name="if:Stretch header image" content="1">     
        <meta name="if:Collapse navigation" content="1">
        <meta name="if:Show description" content="1">
        <meta name="if:Show title" content="1">
        <meta name="if:Show header image" content="1">
        <meta name="if:Endless scrolling" content="1">

        <meta name="select:Avatar style" content="circle" title="Circle">
        <meta name="select:Avatar style" content="square" title="Square">
        <meta name="select:Avatar style" content="hidden" title="Hidden">

        <meta name="select:Layout" content="regular" title="Regular">
        <meta name="select:Layout" content="narrow" title="Narrow">
        <meta name="select:Layout" content="grid" title="Grid">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        
        <link rel="stylesheet" href="public/css/normalize.css">
        <link rel="stylesheet" href="public/css/main.css">
        <!-- HTML5 Shiv -->
        <!--[if lt IE 9]>
                <script src=""public/js//html5shiv.js"></script>
        <![endif]-->
</head>
    <body class="regular index-page">
        <section id="page">
            <div class="nav-menu-wrapper ">
                <nav class="nav-menu pop">
                    <a class="selector"><span class="icon"></span></a>
                    <div class="pop-menu west">
                        <ul>
                            <li class="no-hover"><a href="index.php">首页</a></li>
                            <li><a href="index.php">登出</a></li>
                        </ul>
                    </div> 
                </nav>
                <div class="glass"></div>
            </div>
            <div class="nav-menu-bg"></div>
            <div class="header-wrapper avatar-style-circle">
                <header id="header">
                    <div class="header-image-wrapper">
                        <a href="#" class="header-image parallax cover" data-bg-image="public/img/tumblr_static_greentooth.gif"></a>
                    </div>
         
                    <div class="blog-title content">
                        <!-- avatar & nickname -->
                        <figure class="avatar-wrapper">
                            <a href="#" style="background-image: url(public/img/test.png)" class="user-avatar"><img src="public/img/test.png" alt="" class="print-only invisible"></a>
                        </figure>
                        <h3>test,您好!</h3>
                    </div>
                </header>
            </div>