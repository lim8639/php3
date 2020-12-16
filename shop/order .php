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
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js">
    </script>
</head>
<body>
<?php  include "../utils/header.php"?>

<div class="container">
    <div class="page-header">
        <h1>确认订单<small>请仔细检查您的订单</small></h1>

    </div>
    <div class="order">
        <div class="title">
            1、收货信息
        </div>
        <div class="adrr">
            <form class="form-inline">
                <div class="form-group">
                    <label for="exampleInputName2">收件人姓名</label>
                    <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                </div>
                <button type="submit" class="btn btn-default">Send invitation</button>
            </form>
        </div>
        <div class="title">
            2、配送方式
        </div>
        <div class="tansport">
            <table class="table table-hover">
                <tr>
                    <td>配送方式</td>
                    <td>运费</td>
                    <td>说明</td>
                </tr>
                <tr>
                    <td><label>
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
                <script>
                     var $rdo1 = $('#rdo1');
                     var $rdo2 = $('#rdo2');
                       $rdo1.click(function () {
                              $rdo2.removeAttr('checked');
                       })

                     $rdo2.click(function () {
                         console.log("取消按钮1"+$rdo1.val());
                         $rdo1.attr("checked",false);
                     })
                </script>
            </table>
        </div>
        <div class="title">
            3、商品信息
        </div>
        <div class="adrr">
            <table class="table ">
                <tr style="border-top: none">
                    <th class="first">商品信息</th>
                    <th>单价(元)</th>
                    <th>数量</th>
                    <th>优惠金额(元)</th>
                    <th>小结(元)</th>
                </tr>

                <tr>
                    <td class="first">卡姿兰大眼睛护肤水</td>
                    <td>99.00</td>
                    <td>2</td>
                    <td>-10</td>
                    <td><span class="glyphicon glyphicon-yen"></span>89.00</td>
                </tr>
            </table>
            <div class="try-online"><a class="btn-try btn btn-success btn-lg disabled"></a></div>
        </div>
        <div class="discount">

        </div>
        <div class="title">
            4、支付方式
        </div>

    </div>
</div>

<?php  include "../utils/footer.php"?>

</body>
</html>