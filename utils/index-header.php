<!--页头-->
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
        xmlhttp.open("GET","utils/livesearch.php?q="+str,true);
        xmlhttp.send();
    }
    function showResult2()
    {
        if($("#search_in").val().length==0)
        {
            location.href="shop/mall2.php";
        }
        else
        {
            location.href="shop/mall2.php?key="+$("#search_in").val();
        }
    }
</script>
<style>
    #livesearch div:hover
    {
        background-color: #bbe2c2;
    }
    #livesearch a{
        color: #585656;
        text-decoration:none;
    }
</style>
<header>
    <div id="head">
        <div class="head-left">
<!--            <a href="#">-->
<!--                <img  class="hidden-xs hidden-sm" style="height: 40px" src="asset/src/img2/logo.png" alt="">-->
<!--            </a> -->
            <b>FruitsTalk</b>
        </div>
        <div class="head-right">
            <ul >
                <li >
                    <span id="query"  type="button" style="color: #42b983;background-color: #FFFFFF;
                    height: 38px;border: #FFFFFF" data-toggle="modal" data-target="#myModal">
                        <span  class="glyphicon glyphicon-search"></span>
                        <span class="hidden-sm hidden-xs">Search</span>
                    </span>
                </li>
                <li class="hidden-xs hidden-sm"><a  href="work.php"><b>开发者页面</b></a></li>
                <li class=" hidden-xs hidden-sm" ><a href="shop/mall.php"><b>新语商城</b></a></li>
                <li class="hidden-xs hidden-sm"><a href="user/user.php"><b>个人中心</b></a></li>
                <li class="hidden-lg hidden-md"> <a href="user/user.php"><b><span class="glyphicon glyphicon-home"></span></b></a></li>

            </ul>
        </div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">搜索</h4>
            </div>
            <div class="modal-body" style="padding-bottom: 30px">
                      <div style="text-align: center;width: 80%;padding-left: 10%">
                             <div class="input-group">
                                      <input type="text"  id="search_in" onkeyup="showResult(this.value)" class="form-control" placeholder="Search for...">
                                 <span class="input-group-btn">
                                 <button class="btn btn-default" onclick="showResult2()"  type="button">Go!</button>
                                 </span>
                             </div><!-- /input-group -->
                            <div id="livesearch" style="z-index: 1000;background-color:white;
                            text-align: left;
                            width: 100%;

                            margin-top: -1%;" >
                             </div>

                     <!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div>


<!---->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>-->
<!--                <button type="button" class="btn btn-info">前往</button>-->
<!--            </div>-->
        </div>
    </div>
</div>