<link href="css/brogoods.css" rel="stylesheet">
<?php
include "top.php";
?>
<script>
    function showResult(str)
    {
        if (str.length==0)
        {
            document.getElementById("livesearch").innerHTML="";
            document.getElementById("livesearch").style.border="0px";
            return;
        }
        if (window.XMLHttpRequest)
        {// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行
            xmlhttp=new XMLHttpRequest();
        }
        else
        {// IE6, IE5 浏览器执行
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
                document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET","livesearch.php?q="+str,true);
        xmlhttp.send();
    }
</script>


    <div class="right">
    <div style="padding:10px;width:auto">


        <div class="search" style="display: inline-block">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." onkeyup="showResult(this.value)">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
            </div>
            <div id="livesearch" style="position: absolute; z-index: 10;background-color:white;width: 100%" ></div>
        </div>



        <div class="right_div_title" style="display: inline-block;float: left">
            <strong>商品浏览</strong>
        </div>



        <div class="row" style="margin-top: 40px">
            <?php
            include "conn/conn.php";
            $pagenum= empty($_GET["pagenum"])?1:$_GET["pagenum"];
            $key=empty($_GET["key"])?"":$_GET["key"];

            $pageSize = 4;
            $sql="select * from tab_modity";
            $result=mysqli_query($conn,$sql)or die("数据查询失败".$sql);
            $allNum =mysqli_num_rows($result);
            $endPage = ceil($allNum/$pageSize);
            $sql="select * from tab_modity  where modityname like '%$key%'  limit ". ($pagenum - 1) * $pageSize . "," .$pageSize;
            $result=mysqli_query($conn,$sql)or die("数据查询失败");
            while($row=mysqli_fetch_assoc($result))
            {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<!--第一div放图-->
                        <div class="img">
                            <a href="updategoods.php?moditynum=<?php echo $row['moditynum'];?>">
                                <img src="<?php echo $row["picture"];?>" />
                            </a>

                            <div class="other">
                                <div>
                                    <h3><a href="updategoods.php?moditynum=<?php echo $row['moditynum'];?>"><?php echo $row['modityname'];?></a></h3>
                                </div>
                                <div>$<?php echo $row['sellprice'];?>/$<span><?php echo $row['bid'];?></span></div>
                                <div>
                                    <div class="buttons">
                                        <a class="btn cart" href="updategood.php?moditynum=<?php echo $row['moditynum'];?>"><span class="glyphicon glyphicon-eye-open"></span></a>
                                    </div>
                                </div>

                            </div>

                        </div>
<!--                    第二个div放名称-->

                </div>

                <?php
            }
            ?>
<div class="fan">
            <a href="brogoods.php?pagenum=1"><button type="button" class="btn btn-primary">首页</button></a>
    <a href="brogoods.php?key=<?php echo $key;?>&pagenum=<?php echo ($pagenum==1?1:($pagenum-1));?>"><button type="button" class="btn btn-success">上一页</button></a>
        <a href="brogoods.php?key=<?php echo $key;?>&pagenum=<?php echo ($pagenum==$endPage?$endPage:($pagenum+1));?>"><button type="button" class="btn btn-success">下一页</button></a>
            <a href="brogoods.php?key=<?php echo $key;?>&pagenum=<?php echo $endPage;?>"><button type="button" class="btn btn-info">尾页</button></a>
     </div>
        </div>
    </div>
    </div>
