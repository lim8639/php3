<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>开发页面</title>
    <link rel="shortcut icon" href="../asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/frame.css">
    <link rel="stylesheet" href="css/details.css">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js">

    </script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js">

    </script>
</head>
<body>
<?php include "../utils/header.php"?>
<div style="height: 30px" class="hidden-sm hidden-xs"></div>
<div class="container" >
    <div class="row">
      <div class="left col-lg-5 col-md-5 col-sm-12 col-xs-12">
          <div class="wareimg">
              <img src="../admin/images/pic2.jpg" alt="dada">
          </div>
      </div>
        <div class="right col-lg-6 col-md-6 col-sm-12 col-xs-12">
             <h3>
                 <b>科沃斯地宝DJ35扫地机器人智能家用全自动吸尘器</b>
             </h3>
            <p>双旦抢先购 限时直降600元</p>
            <div class="pan">
              <p>价格：
                  <span id="doller">￥</span>
                  <span id="price">
                      <b>998</b>
                  </span>
                  <a href="#">降价通知</a>
              </p>
               <div class="gzi">

                   <ul>
                       <li style="width: 10%"><img src="#" alt="">logo</li>
                       <li><span class="glyphicon glyphicon-arrow-right"></span>价格平稳</li>
                       <li ><span class="glyphicon glyphicon-eur"></span>更低价</li>
                       <li > <span class="
glyphicon glyphicon-star-empty"></span>降价提醒</li>
                   </ul>
                   <ul id="ul2">
                       <li><p><span class="discount">促</span>先领券后下单</p><p><span class="discount">促</span>先领券后下单</p></li>
                       <li><p><span class="discount">促</span>先领券后下单</p><p><span class="discount">促</span>先领券后下单</p></li>
                   </ul>
               </div>
                <p>进口税 <span id="tax">商家承担</span> <span ><a id="tax2" href="#">税费信息 <span class="glyphicon glyphicon-question-sign"></a></span></span></p>
            </div>
            <div class="adrr">
                <p>配送：<span>秦皇岛 至</span>
                    <label>
                        <select>
                            <option value ="volvo">广西南宁市江南区波尔多庄园</option>
                            <option value ="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>
                    </label>
                    有货预计5-20天送达
                </p>
                <p>运费：<span>店铺单笔订单不满89元，在线支付运费10元</span></p>
            </div>
            <hr>
            <p class="adrr">
                <p>颜色：
                <ul>
                    <li>红色</li>
                    <li>红色</li>
                    <li>红色</li>
                    <li>红色</li>
                    <li>红色</li>
                </ul>
                </p>
            </div>
            <div class="intocar">
                <label>
                    <input id="num" type="text" name="num" value="1">
                </label>
                 <span id="add" class="btn change">
                    +
                 </span>
                <span id="decline" class="btn change">
-
                 </span>
                <script>
                    var num = $('#num');
                    $('#add').click(function () {
                        var value = num.val();
                        value++;
                        num.attr('value',value);
                    })
                    $('#decline').click(function () {
                        var value = num.val();
                        if (value>1){
                            value--;
                            num.attr('value',value);
                        }
                    })
                </script>
                 <button id="btn">
                     <b>加入购物车
                     </b>
                 </button>

            </div>
        </div>
    </div>
</div>

<?php
include "../utils/car.php";
include "../utils/footer.php";

?>
</body>
</html>