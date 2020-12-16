<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单浏览页面</title>
    <link href="css/right.css" rel="stylesheet">
    <link href="css/order_detail.css" rel="stylesheet">


</head>


<body>

<?php
include_once("top.php");
?>
<!--在这里开始具体功能，页面的右半部分-->
<div class="right">
    <!--具体功能的标题与输入框-->
    <div style="padding:10px;width: auto">
        <!-- 标题部分-->
        <div class="right_div_title">
            <strong>订单浏览与管理<strong>
        </div>
        <!--   输入框表格-->
        <?php
        include "conn/conn.php";
        error_reporting(0);
        $ordernum=$_GET["ordernum"];

        //tab_order表和major表关联查询
        $sql1="select * from tab_order where ordernum='$ordernum'";
        $result1=mysqli_query($conn,$sql1) or die("数据查询失败.$sql1");
        $row1=mysqli_fetch_assoc($result1);

        $sql2="select * from tab_order,tab_user where tab_order.customernum=tab_user.customernum ";
        $result2=mysqli_query($conn,$sql2) or die("数据查询失败.$sql2");
        $row2=mysqli_fetch_assoc($result2);

        $sql3="select * from tab_modity where moditynum=(select moditynum from tab_order where ordernum='$ordernum')";
        $result3=mysqli_query($conn,$sql3) or die("数据查询失败.$sql3");
        $row3=mysqli_fetch_assoc($result3);


        ?>
        <form action="add_check.php" method="post" enctype="multipart/form-data" name="form">
            <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">

                <tr bgcolor="#FFFFFF">
                    <td height ="25" colspan="2" align="center" bgcolor="#cecece">
                        <strong>订单详情</strong>
                    </td>
                </tr>

                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">订单编号:</p></td>
                    <td width="618"  align="left">
                        <p class="o"><?php echo $ordernum ?></p>
                    </td>
                </tr>
                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">商品信息：</p></td>
                    <td width="618" >
                        <p style="display:inline-block; class="num";margin:10px 0 0 15px;"><span> <?php echo "商品编号：". $row1["moditynum"]?> </span><p/>
                        <p style="display:inline-block; class="num";margin:10px 0 0 15px;"><span> <?php echo "商品名称：". $row3["modityname"]?> </span><p/>
                        <p style="display:inline-block;class="num"; margin:15px><span> <?php echo "商品数量： ". $row1["num"]."     件" ?> </span><p/>

                    </td>
                </tr>
                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">买家信息：</p></td>
                    <td width="618" >
                        <p style="display:inline-block; class="num";margin:10px 0 0 15px;"><span> <?php echo "买家编号：". $row2["customernum"]?> </span><p/>
                        <p style="display:inline-block;class="num"; margin:15px><span> <?php echo "买家账号： ". $row2["account"]?> </span><p/>

                        <p style="display:inline-block; class="num";margin:10px 0 0 15px;"><span> <?php echo "卖家邮箱：". $row2["email"]?> </span><p/>
                        <p style="display:inline-block; class="num";margin:10px 0 0 15px;"><span> <?php echo "收获地址编号：". $row1["addressnum"]?> </span><p/>
                    </td>
                </tr>
                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">类型:</p></td>
                    <td width="618">
                        <p class="typename" >

                            <?php
                            echo $row3["typename"];
                            ?>
                        </p>

                    </td>
                </tr>

                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">订单总额:</p></td>
                    <td width="618" >
                        <p class="sum" style="margin:5px 0px 10px 0px; color: #0000cc;">

                            <?php
                            echo $row1["money"]."元";
                            ?>
                        </p>
                    </td>
                </tr>

                <tr >
                    <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">商品图片:</p></td>
                    <td width="618" >
                        <div id="pic">

                            <img id="img"  src="<?php if (empty($row3["picture"]))echo "images\strawberry.png";
                            else  echo $row3["picture"] ?>" />

                        </div>
                    </td>
                </tr>


                <tr>
                    <td height="80" align="right">简介：</td>
                    <td>
                        <div style="margin:10px;">
                            <?php

                            if (empty($row2["moditydescribe"]))
                                echo "暂无商品简介";
                            else
                                echo $row2["moditydescribe"]

                            ?>
                        </div>
                    </td>
                </tr>




            </table>
        </form>



    </div>



</div>

</body>
</html>

