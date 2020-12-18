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
    <link rel="stylesheet" href="../asset/css/frame.css">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
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
    $sql = "SELECT * FROM tab_user WHERE account = $id;";

//    开始查询

    $res = queryOneRecord($conn,$sql);

    // 看看查到了什么=> 查到了一个关联数组
//    print_r($res);
    ?>
</div>
<div class="container">
    <div class="row">
        <div class="left col-xs-12 col-sm-6 col-md-4 col-lg-4">
            <div id="fixed">
                <div class="img">
                    <img src="../asset/src/img/th1.png" class="img-circle">
                </div>
                <div class="leftdown">
                    <ul style="padding: 0">
                        <li><h3>用户编号:<?php $_SESSION['username'];?></h3></li>
                        <li><h3>账号:222</h3></li>
<!--                        -->
                        <li><h3>邮箱:<?php
                                //是一个关联数组
                                echo $res['email'];
                                ?>
                            </h3></li>
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
                        <button type="button" onclick="window.location.href='../verfication/check.php?action=logout'" class="btn btn-default" id="btn1">退出登陆</button>

                        <button type="submit" class="btn btn-default" id="btn1">提交</button>
                    </form>
                     <!--<script>
                        $("#btn1").click(function () {
                            var p1 = $("#oldpassword").val();
                            if(p1==''){
                                alert("没有输入旧密码");
                                return false;
                            }
                           var p2 =  $("#confirmpassword3").val();
                           var p3 = $('#newpassword2').val();
                           var email = $('#exampleInputemail').val();
                           // $("#confirmpassword3").attr('value',123);
                           if (p2!=p3){
                               alert("两次密码不相等");
                               return false;
                           }else if (p2!=''&&p3!=''){
                               if(p2==p3){
                                   if (email!=''){
                                       alert("密码和邮箱修改成功");
                                       return false;
                                   }else {
                                       alert("密码修改成功");
                                       return false;
                                   }

                               }
                           }else if (p2==''&&p3==''){
                               if (email!=''){
                                   alert("邮箱修改成功");
                                   return false;
                               }else {
                                   alert("请输入修改后的密码或邮箱");
                                   return false;
                               }
                           }



                        });
                    </script>-->
                </div>
            </div>
            <div class="rightcar" id="car">
                <div class="righttop1">
                    <p>
                        <span class="glyphicon glyphicon-shopping-cart">

                        </span>
                        购物车
                    </p>
                </div>
                <div class="rightcarall">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="../admin/images/222.png" alt="...">
                            <div class="caption">
                                <h3>商品名称</h3>
                                <p>...</p>
                                <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                    <a href="#" class="btn btn-default" role="button">移除</a>
                                </p>6 7i365u
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="..." alt="...">
                            <div class="caption">
                                <h3>商品名称</h3>
                                <p>...</p>
                                <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                    <a href="#" class="btn btn-default" role="button">移除</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="..." alt="...">
                            <div class="caption">
                                <h3>商品名称</h3>
                                <p>...</p>
                                <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                    <a href="#" class="btn btn-default" role="button">移除</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">1</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="rightdan" id="order">
                <div class="righttop1"><h2 align="center"><span class="glyphicon glyphicon-list-alt"></span>我的订单</h2></div>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?php echo "待付款"?>
                                    <span class="badge" style="float: right">14</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="../admin/images/222.png" alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">1</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <?php echo "待发货"?>
                                    <span class="badge" style="float: right">14</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="../admin/images/222.png" alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">1</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <?php echo "待收货"?>
                                    <span class="badge" style="float: right">14</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="../admin/images/222.png" alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">1</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <?php echo "待评价"?>
                                    <span class="badge" style="float: right">14</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="../admin/images/222.png" alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">1</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <?php echo "退款/售后"?>
                                    <span class="badge" style="float: right">14</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="..." alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="orderphoto col-sm-6 col-md-4">
                                    <div class="thumbnail2 thumbnail">
                                        <img src="../admin/images/222.png" alt="...">
                                        <div class="caption">
                                            <h3>商品名称</h3>
                                            <p>...</p>
                                            <p><a href="#" class="btn btn-primary" role="button">购买</a>
                                                <a href="#" class="btn btn-default" role="button">移除</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="page">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">1</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "../utils/footer.php";
?>
</body>
</html>