<?php 
session_start();
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
            <div class="nav-menu-bg"></div>
            <div class="header-wrapper avatar-style-circle">

                <header id="header">
                    <div class="header-image-wrapper">
                        <a href="index.php" class="header-image parallax cover" data-bg-image="public/img/tumblr_static_greentooth.gif"></a>
                    </div>               
                    <div class="blog-title content">
<!--                    <figure class="avatar-wrapper">
                            <a href="index.php" style="background-image: url(public/img/avatar_230b57805790_128.png)" class="user-avatar"><img src="public/img/avatar_230b57805790_128.png" alt="" class="print-only invisible"></a>
                        </figure> -->
                        <?php 
                        require("conn.php");
                        $conn=mysql_open(); 
                        $query="select * from co_exam_adminuser";
                        $result=mysql_query($query);
                        $rs=mysql_fetch_object($result);
                        ?>
                        <h1><?php echo($rs->title); ?></h1>
                        <span class="sub-title"><?php echo($rs->title2); ?></span>
                    </div>
                </header>
            </div>
            <div class="login">
                <a href="intro.php?mk=test"></a>
                <a href="intro.php?mk=test" class='qq'></a>
            </div>
<?php 
    require('footer.php');
?>        