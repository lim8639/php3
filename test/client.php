<?php
/**
 *
 *
 *  前端和后端 相对而言
 *  前端和后端位置上是不一样的，前端是给客户看的，客户看得到的就是前端
 *
 *
 *  后端也叫服务端，再地理位置上，不在客户的电脑，可能在 全球各地
 *
 *  客户 端 发数据到 服务器 叫请求 request
 *  服务端返回数据 响应 response
 *
 *  发起请求，能看到的，就是
 *  1.提交表单，比如登录
 *  2. 看不见的就是 ajax javascrpit的方式
 *
 */
// 表单提交示例：
?>

<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<!--    引入jquery才能使用 $()-->
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
</head>
<body>
<h1> this is  page A </h1>
<!--  表单才能提交,提交到b -->
<form action="server.php" method="post">
<!--    这里是表单的名字随便写-->
    <input id="name" type="text" name="name">
<!--    <input type="submit"> 或者是 ：-->
    <button type="submit">submit</button>
<!--    这个是显式，能看到的跳转，整个网页都会过去-->
</form>

<button type="button" id="btn">这个是隐式的发起请求</button>
<script>
    $('#btn').click(function () {
        // $.post("car.php","action=query",function(result){
         //  alert("hello");
        // },"text");

        $.ajax({
            type: "POST", //请求方式 GET
            url: "server.php", //地址
            data: {action:"修改密码",name:"lin"},//你要提交的数据
            dataType: "text", //返回数据的类型
            success: function(backdata) {  // 获取返回后，执行的函数,返回的数据,写在参数里，可以随便起名字
               alert("返回的数据"+backdata);
            }
        });
    });
</script>
</body>
</html>