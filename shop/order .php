<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>确认订单</title>
    <link rel="shortcut icon" href="../asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/frame.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="../utils/car.css">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js">
    </script>
</head>
<body>
<?php
include "../utils/header.php";
include "../utils/shoppingcar.php";
?>
<div class="container">
    <div class="page-header">
        <h1>确认订单<small>请仔细检查您的订单</small></h1>
    </div>
    <div class="order">
        <div class="title">
            1、收货信息
        </div>
        <div class="row">
            <div class="adrr col-lg-6 col-md-6 col-sm-12 col-xs-12">

            </div>
                <div class="adrr col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">电话</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
                            <div class="col-sm-10">
                                <input select-address p="p" c="c" a="a" d="d" ng-model="xxx" placeholder="请选择所在地" type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">备注</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"  placeholder="">
                            </div>
                        </div>
                        <button >添加地址</button>
                        <div class="form-group">

                        </div>
                        <script>

                        </script>
                    </form>
                </div>
            </div>
        </div>

    <!-- javascript
        ================================================== -->
          <script src="../asset/pluge/adrr/js/plugins/jquery/dist/jquery.min.js" type="text/javascript"></script>
          <script src="../asset/pluge/adrr/js/plugins/angular/angular.min.js" type="text/javascript"></script>
          <script src="../asset/pluge/adrr/js/selectAddress2.js" type="text/javascript"></script>
          <script src="../asset/pluge/adrr/js/index.js"></script>

    <div class="title">
            2、配送方式
    </div>
    <div class="tansport">
            <table class="table table-hover">
              <thead>
                <tr>
                    <td>配送方式</td>
                    <td>运费</td>
                    <td>说明</td>
                </tr>
              </thead>
             <tbody>
                <tr>
                    <td>
                        <label>
                            <input type="radio" id="rdo1" value="1">
                        </label>
                    </td>
                    <td>￥10.00</td>
                    <td>在线订单不满99元支付运费10元</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input id="rdo2" type="radio" value="2">
                        </label>
                    </td>
                    <td>￥0</td>
                    <td>货到付款</td>
                </tr>
                 </tbody>
                <script>
                     var $rdo1 = $('#rdo1');
                     var $rdo2 = $('#rdo2');
                </script>
            </table>
    </div>
     <div class="title">
            3、商品信息
     </div>
     <div class="adrr">
         <table class="table ">
           <thead>
           <tr style="border-top: none">
               <th class="first">商品信息</th>
               <th>单价(元)</th>
               <th>数量</th>
               <th>优惠金额(元)</th>
               <th>小结(元)</th>
           </tr>
           </thead>
                <tbody>
                <tr>
                    <td class="first">卡姿兰大眼睛护肤水</td>
                    <td>99.00</td>
                    <td>2</td>
                    <td>-10</td>
                    <td><span class="glyphicon glyphicon-yen"></span>89.00</td>
                </tr>
                <tr>
                    <td class="first">卡姿兰大眼睛护肤水</td>
                    <td>99.00</td>
                    <td>2</td>
                    <td>-10</td>
                    <td><span class="glyphicon glyphicon-yen"></span>89.00</td>
                </tr>
                </tbody>
         </table>
               <div class="try-online"><a class="btn-try btn btn-success btn-lg disabled"></a></div>
     </div>
     <div class="discount">

     </div>
     <div class="title">
            4、支付方式
      </div>
      <div id="pay">

      </div>

     <div class="sub">
            <button id="btnsub" class="btn btn-danger" type="button">提交订单</button>
     </div>
        <script>
            $('#btnsub').click(function () {
                alert("订单已经提交");
            })
        </script>
</div>
<?php  include "../utils/footer.php"?>

</body>
</html>