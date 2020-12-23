<?php


// 这里可以认为， a是客户端，b是服务端


// 提交以后机会，跳转到server.php 这个网页，提交后，
//server.php的处理就是后端

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
 if ($_POST['name']=='hello'){
     echo "<script>
    alert(\"密码错误,重新输入\");
    window.location.href =\"client.php\";</script>";
     //header('location:client.php'); //密码错误跳回user
 }
?>
</body>
</html>
