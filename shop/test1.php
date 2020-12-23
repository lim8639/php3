<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
    <script type="text/javascript" src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
</head>
<body>
<div id="test">
不存在
</div>
<form action="">
    <input id="text1" type="text" name="key" value="value">
</form>
<h1>hello world</h1>
    <button id="btn">
        test
    </button>
    <script>
         $('#btn').click(function () {

             // $.post("car.php","action=query",function(result){
             //    alert(result);
             // },"text");
             /**
              * 完整的ajax 请求，默认异步请求
              *
              *  ajax 只是看不到，所以觉得难
              */
             // 拿到值 key:value
              $val = $('#text1').val();
             $.ajax({
                 type: "POST",
                 url: "api.php",
                 data: {action:"changepassword",name:$val,p1:1234,p3:456},

                   // request 这个data是要包装在 post或者是get里面发给服务器的
                   //
                   // input
                   // 返回
                 dataType: "text", // json text
                 success: function(aedssdf) { // back response
                    alert(aedssdf);
                 }
             });
         })
    </script>
</body>
</html>