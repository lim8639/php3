<?php
session_start();
if(empty($_SESSION['user']))
{
    header("location:index.php");
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="css/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="css/bootstrap-3.3.7-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="css/right.css" rel="stylesheet">
    <link href="css/top.css" rel="stylesheet">
    <link href="css/left.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <script type="text/javascript" src="js/sdmenu.js"></script>
    <title>管理系统</title>
</head>
<body>
<header>
    <div class="header">
        <section class="header_section_ico">
        </section>
        <section class="header_section_l">
        </section>
        <section class="header_section_r">
            <a href="#">网站首页</a>
            <a href="index.php">系统首页</a>
        </section>
    </div>
</header>
<div id="middle">
<?php
include_once "left.php";
?>
</div>
</body>
</html>
