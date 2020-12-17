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
              */
             $.ajax({
                 type: "POST",
                 url: "car.php",
                 data: {action:"query",moditynum:},
                 dataType: "text",
                 success: function(data) {
                     $('#test').append(data);
                 }
             });
         })
    </script>
</body>
</html>