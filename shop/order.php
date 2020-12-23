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
if (empty($res)){
    header('location:mall.php');
}
if (!empty($_POST['tel'])) {
    $tel2 = $_POST['tel'];
    $mark2 = $_POST['mark'];
    $adrr2 = $_POST['adrr'];
    $name2 = $_POST['name'];
    $sqladd = "INSERT INTO tab_address (datailaddress, name, phonenumber, remarks, customernum)
 VALUES ('$adrr2','$name2','$tel2','$mark2',$uid);";
    if (changeRecord($conn, $sqladd)) {
        echo "     <script>
                                  alert(\"添加成功\");
                              </script>";
    } else {
        echo "     <script>
                                  alert(\"添加失败\");
                      </script>";
    }
}

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
                                     <input type="hidden" id="">
                     <?php

                     $sql1 = "select  * from  tab_address where customernum = '$uid';";
                     $resc = queryList($conn,$sql1);
                     if (empty($resc)){
                         echo "     <tr class=\".danger\">
                                         <td>您當前沒有收貨地址！！</td>
                           
                                     </tr>";
                         $myaddress = 0;
                     }else{
                         $myaddress = $resc[0]['addressnum'];
                         foreach ($resc as $it){
                             $tel = $it['phonenumber'];
                             $addr = $it['datailaddress'];
                             $mark = $it['remarks'];
                             $name = $it['name'];
                             echo "   <tr class=\"success\"
                                         <td>$name</td>
                                         <td >$tel</td>
                                         <td>$addr</td>
                                         <td>$mark</td>
                                          <td><span class=\"\">X</span></td>
                                             </tr>";
                         }
                     }

                     ?>
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
                              <form class="form-horizontal" action="order.php" method="post" id="adrrform">
                                  <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="name" class="form-control"  placeholder="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputEmail3"  class="col-sm-2 control-label">电话</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="tel" class="form-control"  placeholder="">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputPassword3"  class="col-sm-2 control-label">地址</label>
                                      <div class="col-sm-10">
                                              <input select-address p="p" c="c" a="a" d="d" ng-model="xxx" name="adrr" placeholder="请选择所在地" type="text" class="form-control" />
                                              <!-- javascript
        ================================================== -->
<!--                                              <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js" type="text/javascript"></script>-->
                                              <script src="js/plugins/angular/angular.min.js" type="text/javascript"></script>
                                              <script src="js/selectAddress2.js" type="text/javascript"></script>
                                              <script src="js/index.js"></script>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="inputEmail3" class="col-sm-2 control-label">备注</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="mark" class="form-control"  placeholder="">
                                      </div>
                                  </div>
                                  <button type="submit" class="btn btn-md">点击添加</button>
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
                            <input type="radio" checked="checked"  name="gender"  >
                        </label>
                    </td>
                    <td>￥10.00</td>
                    <td>在线订单不满99元支付运费10元</td>
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

           <input type="text" id="adrr" name="adrr" value="<?php
            echo $myaddress;
             ?>"
           >
           <div class="sub">
               <button id="btnsub" class="btn btn-danger" type="submit">提交订单</button>
               <a href="mall.php" class="btn btn-default">取消订单</a>
               <script>
                   $('#btnsub').click(function () {

                       if ($('#adrr').val()==0){
                           alert("地址为空，请选择地址");
                           return false;
                       }
                   })
               </script>
           </div>
       </form>
</div>
<?php  include "../utils/footer.php"?>
</body>
</html>