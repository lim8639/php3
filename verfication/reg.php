<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册页面</title>
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../asset/css/frame.css">
    <link rel="shortcut icon" href="asset/src/icon/favicon.ico">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js" type="text/javascript">
    </script>
    <style>
        .login{
            width: 300px;
            margin: 30px auto;
        }
    </style>
</head>
<body>
<header>
    <div class="container" style="padding: 0">
        <img src="../asset/src/img/logo.png" alt="">
        <div class="header-right">
            <ul> <li><a href="../shop/order%20.php">登录</a></li>
                <li><a href="../verfication/login.php">登录</a></li>
                <li><a href="../index.php">首页</a></li>
            </ul>
        </div>
    </div>
</header>
<h1 align="center" style="margin-top: 100px">
    注册页面
</h1>
<div class="login">
<!--    <br /><b>Notice</b>:  Undefined index: username in <b>X:\wnmp\nginx-1.18.0\web\html_php\test7\login.php</b> on line <b>26</b><br />-->
<form action="check.php" method="post">
    <div class="form-group">
        <label for="exampleInputPassword1">账号</label>
        <input type="text" value="<?php
        if (!empty($_GET['username'])){
            echo $_GET['username'];
        }
        ?>" class="form-control" name="username" id="exampleInputText" placeholder="input your username please">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail">邮箱</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="email input in this">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">邮箱验证码</label>
        <input type="text" value="" class="form-control" name="code" id="exampleInputText" placeholder="input your code of email">
        <button type="button" class="btn btn-default" id="get_email_code" >发送验证码</button>
        <script>
            $('#get_email_code').click(function () {
                $('#get_email_code').attr('disabled','true');
                setTimeout(function () {
                    $('#get_email_code').attr('disabled','false');
                },10000)
            })
        </script>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">密码</label>
        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="and the Password as well">
    </div>
    <input type="hidden" name="action" value="reg" >
    <input type="submit" id="toLogin" class="btn btn-default">
    <script>
        $('#toLogin').click(function () {
    if ($('#InputPassword').val()==""|| $('#exampleInputText').val()==""||$('#email').val()==""){
        alert("请输入账号秘密");
        return false;
    }
    return true;
});
    </script>
</form>
</div>
</body>
</html>