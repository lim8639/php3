<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>浏览记录</title>
    <style>
        .browse{
            position: relative;
            top: 60px;
            left:23%;
            height: 100%;
            width: 75%;
            background: #fff;

        }
        table{
            margin-top:50px;
            width:80%;
            border:1px #B3CDE8 solid;
        }
        th
        {
            text-align:center;
            background-color:#C8F4FF;
        }
        tr
        {        height:35px;
        }


        #top{
            margin:50px auto;
            width:75%;
            height:25px;
        }
        a{
            text-decoration:none;
            color:#66f;
        }

        a:hover{
            color:#F96;
        }
        #search{
            float:right;}
        input{
            height: 20px;
            margin-bottom: 1px;
            margin: ;
        }
        form{
            margin: 0 130px 0 200px;
        }

    </style>
    <title>浏览记录</title>
</head>
<body>


<?php
//访问控制
include "conn.php";//包含连接文件
include "top.php";



$key='';
$pageSize=2;//
$pageNum=empty($_GET["pageNum"])?1:$_GET["pageNum"];
//echo "要显示的页码是:$pageNum <br>";

$sql="select * from tab_order,tab_modity where tab_order.moditynum=tab_modity.moditynum";//构造SQL语句
if($_SERVER["REQUEST_METHOD"]=="POST")//如果是提交表单
{
    $key=$_POST["key"];
    $sql=" select * from tab_order where ordernum = $key";}
$result=mysqli_query($conn,$sql);

$allNum=mysqli_num_rows($result);
$endPage=ceil($allNum/$pageSize);
//echo"总记录条数".$allNum."<br>";
//echo"总页数".$endPage;
//$sql.="  limit ($pageNum-1)*$pageSize,$pageSize";
$sql.=" order by ordernum limit ".($pageNum-1)*$pageSize.",".$pageSize;
?>
<div class="browse">
    <div id="top">


        <div id="search">
            <form action="order_browse.php"" method="post" enctype="multipart/form-data" name="form">
            <input type="text" name="key" value="<?php echo $key;?>" /><span>根据订单编号进行查询</span>
            <input type="submit" value="查询"/>
            </form>

        </div>

        <?php
        $result=mysqli_query($conn,$sql)or die("数据查询失败".$sql);//执行SQL语句
        if(mysqli_num_rows($result)>0){ //判断是否有查询结果
            echo"<table align='center' >";//输出表格标签
            echo"<tr>
       
         <th>进货订单编号</th>
		<th>商品编号</th>
		<th>进货数量</th>
		<th>进货金额</th>
		<th>管理员</th>

		<th colspan='2'></th></tr>";//输出表头行
            while($row=mysqli_fetch_assoc($result))//从记录集获取一行数据到数组，不为false，则显示该行数据(数组中各元素
            {
                ?>

                <tr onMouseOver="this.style.backgroundColor='#D8F4FF';"onMouseOut="this.style.backgroundColor='#ffffff';">

                <?php

                echo"
       <td >$row[ordernum]</td>
       <td>$row[moditynum]</td>
       <td>$row[num]</td>
	   <td>$row[money]</td>
       <td>$row[customernum]</td>
       ";

                echo"</tr>";//输出行结束标记
            };
            ?>
            <tr>
                <td colspan="10" align="center">
                    <a href="?pageNum=1">首页</a>
                    <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
                    <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
                    <a href="?pageNum=<?php echo $endPage?>">尾页</a>
                </td>
            </tr>


            <?php
            echo"</table>";//输出表格结束标记
        }
        else //没有查询结果
            echo"尚无订单信息";

        ?>
    </div>
</body>

</html>
