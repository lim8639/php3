<?php

/**
 * SESSION 是一个重要的变量
 * 利用SESSION可以将数据存储在服务器，从而实现跨页面访问
 *
 */
include "../verfication/usersession.php";
include "../admin/conn.php";

?>
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心页</title>
    <link rel="shortcut icon" href="../asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="user2.css">
    <link rel="stylesheet" href="../shop/css/mall.css">
    <link rel="stylesheet" href="../utils/car.css">
    <link rel="stylesheet" href="../asset/css/frame.css">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../shop/js/car.js"></script>
    <style>
        header{
            z-index: 100;
            position: fixed;
            top: 0;
        }
        #header{
            height: 40px;
        }
    </style>

</head>
<body>
<!--

-->
<!--改一下布局
换成表格 传值
-->
<div id="header">
    <?php
    include "../utils/header.php";
    include "../utils/conn.php"; // 获取链接 $conn
    include "../utils/dao.php"; // 直接调用函数
//    查询一个用户,这里是我的锅，偷懒我就没改
    $id = $_SESSION['username']; // 在登录界面
    // 这里黄色按 alt + enter  意思是设置一个标准给他检查
    // 那就换成account
//    echo $id;
    $sql = "SELECT * FROM tab_user WHERE customernum = '$id';";

//    开始查询

    $res = queryOneRecord($conn,$sql);

    // 看看查到了什么=> 查到了一个关联数组
//    print_r($res);
    ?>
</div>
<div class="container" style="padding-top: 40px;">
    <div class="row">
        <div class="left col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div id="fixed">
                <div class="img">
                    <img src="../asset/src/img2/head.jpg" class="img-circle">
                </div>
                <div class="leftdown">
                    <ul style="padding: 0">
                        <li><h3>用户编号:<?php echo $res['customernum'];?></h3></li>
                        <li><h3>账号:<?php echo $res['account'];?></h3></li>
                        <li><h3>邮箱:<?php echo $res['email'];?></h3></li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            $(document).scroll(function () {
                var h = document.body.clientWidth-168;
                var w = document.body.clientWidth; //window.screen.width;
                var he = window.screen.height-740;
                var scroH = $(document).scrollTop();
                var fixed = $('#fixed');
                // console.log(scroH+"高度"+he+"宽度"+w);
                if (w>761&&scroH<h){
                    fixed.css('padding-top',scroH+"px");
                    fixed.css('padding-bottom',he+"px");
                }
            })
        </script>
        <div class="right col-xs-12 col-sm-6 col-md-8 col-lg-8">
            <div class="righttop">
                <ul class="list-inline" style="height: 40px;">
                    <li><a href="#order"><span class="glyphicon glyphicon-list-alt"></span>我的订单</a></li>
                    <li><a href="#car"><span class="glyphicon glyphicon-shopping-cart"></span>购物车</a></li>
                    <li><a href="#me"><span class="glyphicon glyphicon-user"></span>我的帐户</a></li>
                </ul>
            </div>
            <div class="rightme" id="me">
                <div class="righttop1">
                  <p><span class="glyphicon glyphicon-user"></span>USER我的账户</p>
                </div>
                <div class="rightmemiddle" >
                    <form id="userform" method="post" action="checkuser.php" style="width:62%;align-self: center">
                        <div class="form-group">
                            <label for="oldpassword">旧密码</label>
                            <input type="password"  name="p1" class="form-control" id="oldpassword" placeholder="password">
                        </div>
                        <div class="form-group">
                            <label for="newpassword2">新密码</label>
                            <input type="password" name="p2" class="form-control" id="newpassword2" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword3">确认密码</label>
                            <input type="password" name="p3" class="form-control" id="confirmpassword3" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputemail">修改邮箱</label>
                            <input type="email"  name="email" class="form-control" id="exampleInputemail" placeholder="email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">修改头像</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Example block-level help text here.</p>
                        </div>
                        <button type="button" onclick="window.location.href='../verfication/check.php?action=logout'" class="btn btn-default" id="btn1">
                            退出登陆
                        </button>
                        <button type="submit" class="btn btn-default" id="btn12">提交</button>
                    </form>

                </div>
            </div>
<!--            <div class="rightcar" id="car">-->
<!--                <div class="righttop1">-->
<!--                    <p>-->
<!--                        <span class="glyphicon glyphicon-shopping-cart">-->
<!--                        </span>-->
<!--                        购物车-->
<!--                    </p>-->
<!--                </div>-->
<!--                <div class="rightcarall">-->
<!--                    <div class="col-sm-6 col-md-4">-->
<!--                        <div class="thumbnail">-->
<!--                            <img src="../admin/images/222.png" alt="...">-->
<!--                            <div class="caption">-->
<!--                                <h3>商品名称</h3>-->
<!--                                <p>...</p>-->
<!--                                <p><a href="#" class="btn btn-primary" role="button">购买</a>-->
<!--                                    <a href="#" class="btn btn-default" role="button">移除</a>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-6 col-md-4">-->
<!--                        <div class="thumbnail">-->
<!--                            <img src="..." alt="...">-->
<!--                            <div class="caption">-->
<!--                                <h3>商品名称</h3>-->
<!--                                <p>...</p>-->
<!--                                <p><a href="#" class="btn btn-primary" role="button">购买</a>-->
<!--                                    <a href="#" class="btn btn-default" role="button">移除</a></p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-sm-6 col-md-4">-->
<!--                        <div class="thumbnail">-->
<!--                            <img src="..." alt="...">-->
<!--                            <div class="caption">-->
<!--                                <h3>商品名称</h3>-->
<!--                                <p>...</p>-->
<!--                                <p><a href="#" class="btn btn-primary" role="button">购买</a>-->
<!--                                    <a href="#" class="btn btn-default" role="button">移除</a></p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="page">-->
<!--                    <nav aria-label="Page navigation">-->
<!--                        <ul class="pagination">-->
<!--                            <li>-->
<!--                                <a href="#" aria-label="Previous">-->
<!--                                    <span aria-hidden="true">&raquo;</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                            <li><a href="#">5</a></li>-->
<!--                            <li><a href="#">4</a></li>-->
<!--                            <li><a href="#">3</a></li>-->
<!--                            <li><a href="#">2</a></li>-->
<!--                            <li><a href="#">1</a></li>-->
<!--                            <li>-->
<!--                                <a href="#" aria-label="Next">-->
<!--                                    <span aria-hidden="true">&laquo;</span>-->
<!--                                </a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </nav>-->
<!--                </div>-->
<!--            </div>-->
            <div class="rightdan" id="order">
                <div class="righttop1"><h2 align="center"><span class="glyphicon glyphicon-list-alt"></span>我的订单</h2></div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    $sql1="select tab_modity.modityname,tab_modity.moditynum,tab_book.oid,tab_modity.sellprice,tab_book.ordertime from tab_modity join tab_mo on tab_mo.mid
= tab_modity.moditynum join tab_book on tab_mo.oid
 = tab_book.oid where customernum = 2007";
                    $rres=queryList($conn,$sql1);
                    foreach($rres as $it){
                        $oid=$it['oid'];
                        $moditynum=$it['moditynum'];
                        $modityname=$it['modityname'];
                        $sellprice=$it['sellprice'];
                        $ordertime=$it['ordertime'];
                    }
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo "已成功订单"?>
                                    <span class="badge" style="float: right"><?php echo count($rres)?></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">已成功订单</div>

                                    <!-- Table -->
                                    <table class="table">
                                        <tr>
                                            <th>订单编号</th>
                                            <th>商品编号</th>
                                            <th>商品名称</th>
                                            <th>商品价格</th>
                                            <th>成交时间</th>
                                        </tr>
                                        <?php
                                        $sql1="select tab_modity.modityname,tab_modity.moditynum,tab_book.oid,tab_modity.sellprice,tab_book.ordertime from tab_modity join tab_mo on tab_mo.mid
= tab_modity.moditynum join tab_book on tab_mo.oid
 = tab_book.oid where customernum = 2007";
                                        $rres=queryList($conn,$sql1);
                                        foreach($rres as $it){
                                            $oid=$it['oid'];
                                            $moditynum=$it['moditynum'];
                                            $modityname=$it['modityname'];
                                            $sellprice=$it['sellprice'];
                                            $ordertime=$it['ordertime'];
                                               echo "<tr>";
                                               echo "<td>";
                                               echo $oid;
                                               echo "</td>";
                                               echo "<td>";
                                               echo $moditynum;
                                               echo "</td>";
                                               echo "<td>";
                                               echo $modityname;
                                               echo "</td>";
                                               echo "<td>";
                                               echo $sellprice;
                                               echo "</td>";
                                               echo "<td>";
                                               echo $ordertime;
                                               echo "</td>";

                                               echo "</tr>";
                                   }
                                        ?>

                                    </table>
                                </div>
                        </div>
                    </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <?php echo "未支付订单"?>
                                    <span class="badge" style="float: right">0</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">未支付订单</div>

                                    <!-- Table -->
                                    <table>
                                        <table class="table">
                                            <tr>
                                                <th>订单编号</th>
                                                <th>商品编号</th>
                                                <th>商品名称</th>
                                                <th>商品价格</th>
                                                <th>成交时间</th>
                                            </tr>
                                            <tr>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                            </tr>
                                        </table>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <?php echo "待收货"?>
                                    <span class="badge" style="float: right"><?php echo count($rres)?></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">待收货订单</div>

                                    <!-- Table -->
                                    <table>
                                        <table class="table">
                                            <tr>
                                                <th>订单编号</th>
                                                <th>商品编号</th>
                                                <th>商品名称</th>
                                                <th>商品价格</th>
                                                <th>成交时间</th>
                                            </tr>
                                            <tr>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                            </tr>
                                        </table>

                                    </table>
                                </div>
                            </div>
                    </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <?php echo "待评价"?>
                                    <span class="badge" style="float: right"><?php echo count($rres)?></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">待评价订单</div>

                                    <!-- Table -->
                                    <table>
                                        <table class="table">
                                            <tr>
                                                <th>订单编号</th>
                                                <th>商品编号</th>
                                                <th>商品名称</th>
                                                <th>商品价格</th>
                                                <th>成交时间</th>
                                            </tr>
                                            <tr>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                            </tr>
                                        </table>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <?php echo "退款/售后"?>
                                    <span class="badge" style="float: right"><?php echo count($rres)?></span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <div class="panel panel-default">
                                    <!-- Default panel contents -->
                                    <div class="panel-heading">退款/售后订单</div>

                                    <!-- Table -->
                                    <table>
                                        <table class="table">
                                            <tr>
                                                <th>订单编号</th>
                                                <th>商品编号</th>
                                                <th>商品名称</th>
                                                <th>商品价格</th>
                                                <th>成交时间</th>
                                            </tr>
                                            <tr>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                                <th>...</th>
                                            </tr>
                                        </table>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <input type="hidden" id="islogin" value="<?php if(empty($_SESSION['username'])){
        echo "0";
    }else{
        echo "1";
    }?>">
    <script>
        $('.btn-into-car').click(function () {
            var value = $(this).children('input').val();
            $.ajax({
                type: "POST",
                url: "car.php",
                data: {action:"addOneCar",moditynum:value,shopnum:1},
                dataType: "text",
                async:true,
                success: function(data){
                    $n =  $('#num-car')
                    $n.html('');
                    $n.append(data);
                }
            });
        });
    </script>
    <div class="kind"></div>
    <div id="car" data-toggle="modal" data-target="#myModal1">
        <div id="num-car"></div>
        <img src="../asset/src/img2/car.png" alt="">
    </div>
</div>

<?php
include "../utils/shoppingcar.php";
include "../utils/footer.php";
?>
</body>
</html>