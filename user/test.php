<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <style>
        .big{
            width: 800px;
            height: 600px;
            background-color: purple;
            position: relative;
        }

        .small{
            /*子绝父相*/
            position: absolute;

            margin-top: -100px;
            margin-left: -100px;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            background-color: pink;
        }

        #small{
            display: inline-block;
            width: 200px;
            height: 200px;
            background-color: skyblue;
        }
    </style>
</head>
<body>
<div class="big">
    <div class="small">
   ouabosuvsiudbvosidvbnpavosa[v
    </div>
</div>
</body>
</html>