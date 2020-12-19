<?php
$GLOBALS['root'] = dirname(__FILE__);
?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>开发页面</title>
    <link rel="shortcut icon" href="asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/frame.css">
    <style>
        a{
            height: 45px;
            font-size: 20px;
            margin-top: 5px;
        }
        .img{
            height: 300px;
            width: 40%;
        }
        .img img{

            height: 100%;
        }
        h3{
            margin-bottom: 10px;
            margin-top: 50px;
        }
        iframe{
            border: 1px silver solid;
        }
    </style>
</head>
<body>
<?php include "utils/header.php"?>
<div class="container">
    <div class="row">
        <h1>齐赞完成了gitHub测试</h1>
        <h1>三级项目开发页面</h1>

        <div class="col-xs-12 .col-sm-12 col-md-6 col-lg-6">

            <h3>一、快速链接</h3>
            <ul >
                <li><a target="_blank"  href="http://123.56.1.58:18888/phpmyadmin_118f0afc000e0c50/index.php">phpmyadmin</a></li>
                <li><a target="_blank"  href="https://v3.bootcss.com/">bootstrap</a></li>
                <li><a target="_blank"  href="https://coolors.co/">配色网站</a></li>
                <li><a target="_blank"  href="#"></a></li>
                <li><a target="_blank"  href="#"></a></li>
            </ul>
            <h3>二、网站目录</h3>
            <div class="img">
                <img src="asset/src/img2/VERK8CS6TL74N4VAUDSZ252.png" alt="dada">
            </div>

            <div class="hello">

            </div>
        </div>
        <div class="col-xs-12 .col-sm-12 col-md-6 col-lg-6">
            <h3>三、工作日志</h3>
            <div class="img">
                问题发现
            </div>
        </div>
    </div>
</div>
<footer>
<div class="container">
   <div class="copyright">
       <p> @2018-2021 水果新语</p>
       <p>©copyright 版权所有侵权必究</p>
       <p>@0771-10086 @email 863978160@qq.com</p>
   </div>
</div>
</footer>
</body>
</html>