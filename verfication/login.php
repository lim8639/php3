<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登录表单</title>
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../asset/css/frame.css">
    <link rel="shortcut icon" href="../asset/src/icon/favicon.ico">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js" type="text/javascript">
    </script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript">
    </script>
    <style>
        .login{
            width: 300px;
            margin: 30px auto;
        }
    </style>
</head>

<body>
<?php
include "../utils/header.php";
?>

<h1 align="center" style="margin-top: 100px">
    用户登录
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
        ?>" class="form-control" name="username" id="exampleInputText" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">密码</label>
        <input type="password" class="form-control" name="password" id="InputPassword" placeholder="">
    </div>
    <div class="form-group">
        <input type="hidden"  name="action" value="login">
    </div>
    <input type="submit" id="toLogin" class="btn btn-default"><span style="color: red;"><?php   if (!empty($_GET['msg'])){
            echo $_GET['msg'];
        }?></span>
    <script>
        $('#toLogin').click(function () {
            if ($('#InputPassword').val()===""|| $('#exampleInputText').val()===""){
                alert("请输入账号秘密");
                return false;
            }
             return true;
        });
    </script>
    <button type="button" onclick="location='reg.php'" class="btn btn-default">注册>></button>

</form>
</div>
</body>
</html>