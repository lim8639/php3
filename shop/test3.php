<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>hello world</title>
<link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
<label for="show">hello</label>
<input type="text" name="hello" id="show">
<div class="col-sm-10">
    <input type="radio">
    <input type="button" id="btn" value="hello">
    <input select-address p="p" c="c" a="a" d="d" ng-model="xxx" name="adrr" placeholder="请选择所在地" type="text" class="form-control" />
    <!-- javascript
================================================== -->
                                                  <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js" type="text/javascript"></script>
    <script src="js/plugins/angular/angular.min.js" type="text/javascript"></script>
    <script src="js/selectAddress2.js" type="text/javascript"></script>
       <script src="js/index.js"></script>
    <script>
        $('#btn').click(function () {
            alert("hello world");
        })
    </script>
</div>


<form id="myform" action="test1.php" method="post">
    <label>
        <input type="text">
        <button id="bt">
            提交
        </button>
    </label>
</form>



</body>
</html>