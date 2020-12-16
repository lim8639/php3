<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加商品页面</title>

    <link href="css/addgoods.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

</head>
<script>
    function changepic() {
        var reads= new FileReader();

        f=document.getElementById('file').files[0];

        reads.readAsDataURL(f);

        reads.onload=function (e) {

            document.getElementById('img').src=this.result;

        };

    }

</script>

<body>

<?php
include_once("top.php");
?>
<!--在这里开始具体功能，页面的右半部分-->
<div class="right">
<!--具体功能的标题与输入框-->
<div style="padding:10px;width:auto">
<!-- 标题部分-->
<div class="right_div_title">
  <strong>添加商品</strong>
</div>
<!--   输入框表格-->
    <?php
    include "conn/conn.php";
    $sql="select * from tab_type";
    $result=mysqli_query($conn,$sql) or die("数据查询失败");
    ?>
    <form action="add_check.php" method="post" enctype="multipart/form-data" name="form">
        <table width="100%" border="0" cellpadding="6" cellspacing="0" bgcolor="#BCE8B5" class="table table-bordered">

        <tr bgcolor="#FFFFFF">
      <td height ="25" colspan="2" align="center" bgcolor="#cecece">
          <strong>添加商品</strong>
      </td>
      </tr>

        <tr >
            <td  height ="35" align="right"  ><p style="margin-top: 5px">名称:</p></td>
            <td width="618" >
                <input type="text" name="modityname" size="20" class="form-control" style="width: 50%">
            </td>
        </tr>
        <tr >
            <td  height ="35" align="right"  ><p style="margin-top: 5px">价格:</p></td>
            <td width="618" >

                  <p style="display:inline-block;">进价：</p> <input type="text" name="bid" size="20" class="form-control" style="width: 10%;display:inline-block;"><p style="display:inline-block;">&nbsp;元/斤</p>
                  <p style="display:inline-block; margin-left: 20px;">售价：</p> <input type="text" name="sellprice" size="20" class="form-control" style="width: 10%;display:inline-block;"><p style="display:inline-block;">&nbsp;元/斤</p>

            </td>
        </tr>
            <tr >
                <td  height ="35" align="right"  ><p style="margin-top: 5px">类型:</p></td>
                <td width="618">
                    <div  class="form-group" style="width: 50%;">
                        <select name="typename" class="form-control">


                            <?php
                        while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <option value="<?php echo $row['typename'] ?>"><a><?php echo $row['typename']?></a>
                            </option>

                        <?php } ?>
                        </select>
                    </div>

                </td>
            </tr>

            <tr >
                <td  height ="35" align="right"  ><p style="margin-top: 5px">库存:</p></td>
                <td width="618" >
                    <input type="text" name="warehouse" size="20" class="form-control" style="width: 50%">
                </td>
            </tr>

            <tr >
                <td width="129" height ="35" align="right"  ><p style="margin-top: 5px">商品图片:</p></td>
                <td width="618" >
                    <input type="button" id="i-check" value="选择图片" class="btn btn-primary" onclick="$('#file').click();">
                    <input type="file" name="file" id="file" onchange="changepic(this);" style="display: none;"/>
                    <div id="pic">

                        <img id="img"  src="images/1234.png" alt="没有素材图" />

                    </div>
                </td>
            </tr>


            <tr>
                <td  height="80" align="right">简介：</td>
                <td>
                    <script id="container" name="content" type="text/plain">这里写商品简介</script>
                    <!-- 配置文件 -->

                    <script type="text/javascript" src="ueditor/ueditor.config.js"></script>

                    <!-- 编辑器源码文件 -->

                    <script type="text/javascript" src="ueditor/ueditor.all.js"></script>

                    <!-- 实例化编辑器 -->

                    <script type="text/javascript">

                        var editor = UE.getEditor('container',{initialFrameWidth:'100%',initialFrameHeight:'100%'});


                    </script>


                </td>
            </tr>

            <tr>
                <td height="25" colspan="2"><input type="submit" id="submitBtn" value="确定" class="btn btn-info " style="width:80px;">
                </td>
            </tr>


        </table>
    </form>



</div>



</div>

</body>
</html>

