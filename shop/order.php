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
include "../verfication/usersession.php";
include "../utils/conn.php";
include "../utils/dao.php";
$uid = $_SESSION['username'];

$sql = "select * from tab_modity left join tab_shop on
 tab_shop.moditynum = tab_modity.moditynum where tab_shop.customernum = '$uid';";

$res = queryList($conn,$sql);
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
                         <div class="adrr showadrr col-lg-6 col-md-6 col-sm-12 col-xs-12">
                             <div class="selectadrr"  >
                                 <p class="title2">#选择地址</p>
                                 <table class="table table-condensed">
                                     <thead>
                                        <tr>
                                            <th>姓名</th>
                                            <th>电话</th>
                                            <th>地址</th>
                                            <th>备注</th>
                                            <th>删除</th>
                                        </tr>
                                     </thead>
                                     <tbody>
                                     <tr class=".success">
                                         <td>林鹏飞</td>
                                         <td>10086</td>
                                         <td> 广西南宁市江南区白沙大道波尔多庄园</td>
                                         <td>备注</td>
                                         <td><span class="">X</span></td>
                                     </tr>
                                     <tr class="success">
                                         <td class="active">姓名</td>
                                         <td>电话</td>
                                         <td >地址</td>
                                         <td>备注</td>
                                         <td>备注</td>
                                     </tr>

                                     </tbody>
                                 </table>
                             </div>
                             <div class="selectadrr">
                                 <div class="alert alert-success" role="alert">
                                     当前地址选择
                                 </div>
                             </div>
                         </div>
                        <div class="adrr col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="myddr">
                              <p class="title2">#添加地址</p>
                              <form class="form-horizontal" id="adrrform">
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
                                              <!-- javascript
        ================================================== -->
                                              <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js" type="text/javascript"></script>
                                              <script src="js/plugins/angular/angular.min.js" type="text/javascript"></script>
                                              <script src="js/selectAddress2.js" type="text/javascript"></script>
                                              <script src="js/index.js"></script>

                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">备注</label>
                                      <div class="col-sm-10">
                                          <input type="text" class="form-control"  placeholder="">
                                      </div>
                                  </div>
                                  <button class="btn btn-md">点击添加</button>
                                  <div class="form-group">

                                  </div>

                              </form>
                          </div>
                        </div>
                    </div>
            </div>
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
                            <input type="radio" name="gender"  >
                        </label>
                    </td>
                    <td>￥10.00</td>
                    <td>在线订单不满99元支付运费10元</td>
                </tr>
                <tr>
                    <td>
                        <label>
                            <input   type="radio" name="gender" value="2">
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

               <?php
               foreach ($res as $item)
                  echo "<tr>
                    <td class=\"first\">".$item['modityname']."</td>
                    <td>".$item['sellprice']."</td>
                    <td>".$item['shopnum']."</td>
                    <td>-10</td>
                    <td><span class=\"glyphicon glyphicon-yen\"></span>".$item['sellprice']*2 ."</td>
                </tr>"
               ?>
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

       <form action="submitorder.php" method="post">
           hello world
           <div class="sub">
               <button id="btnsub" class="btn btn-danger" type="submit">提交订单</button>
           </div>
       </form>
</div>
<?php  include "../utils/footer.php"?>
</body>
</html>