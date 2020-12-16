
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>水果新语</title>
    <link rel="shortcut icon" href="asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/frame.css">
    <link rel="stylesheet" href="asset/css/index.css">
    <script src="asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="asset/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>

<body style="padding-right: 0">

<?php
include "utils/index-header.php";
?>
<nav >
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="asset/src/img2/86016044_p0.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="asset/src/img2/86016044_p0.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
            <div class="item">
                <img src="asset/src/img2/86016044_p0.png" alt="...">
                <div class="carousel-caption">
                    ...
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</nav>
<!--Main-->
<div class="top1">
<!-- 滚动图的第一层section   -->
    <section class="top1_div_first">
<!--滚动图的第二层div-->
        <div class="top1_div_second">
<!--滚动图的第三层div-->
            <div class="top1_div_third">
                            <p class="top1_p_first">精品水果</p>
                            <div class="top1_div_fourth">
                                <ul class="top1_ul_first" role="tablist">
                                    <li class="top1_li_first" role="presentation"><button type="button" style="background-color:#fff;" class="top1_button_first">水果皇后</button></li>
                                    <li class="top1_li_first"><button type="button" style="background-color:#fff;" class="top1_button_first">水果皇后</button></li>
                                    <li class="top1_li_first"><button type="button" style="background-color:#fff;" class="top1_button_first">水果皇后</button></li>
                                    <li class="top1_li_first"><button type="button" style="background-color:#fff;" class="top1_button_first">水果皇后</button></li>
                                    <li class="top1_li_first"><button type="button" style="background-color:#fff;" class="top1_button_first">水果皇后</button></li>
                                </ul>
                            </div>
                <div class="show">



                    <div class="container">
                        <div class="list" style="left:0px;">
                            <!--<img src="../static/image/photo1.jpg" alt="5"/>-->
                            <img src="../static/image/banner.jpg" alt="1"/>
                            <img src="../static/image/slide1.jpg" alt="2"/>
                            <img src="../static/image/slide1.jpg" alt="3"/>
                            <img src="../static/image/slide1.jpg" alt="4"/>
                            <img src="../static/image/photo1.jpg" alt="5"/>
                            <!--<img src="../static/image/banner.jpg" alt="1"/>-->
                        </div>
                        <div class="pointer">
                            <span index="1" class="on"></span>
                            <span index="2"></span>
                            <span index="3"></span>
                            <span index="4"></span>
                            <span index="5"></span>
                        </div>

                    </div>

                    <script></script>
                    <script>
                        var imgCount = 5;
                        var index = 1;
                        var intervalId;
                        var buttonSpan = $('.pointer')[0].children;//htmlCollection 集合
                        //自动轮播功能 使用定时器
                        autoNextPage();
                        function autoNextPage(){
                            intervalId = setInterval(function(){
                                nextPage(true);
                            },3000);
                        }
                        //当鼠标移入 停止轮播
                        $('.container').mouseover(function(){
                            console.log('hah');
                            clearInterval(intervalId);
                        });
                        // 当鼠标移出，开始轮播
                        $('.container').mouseout(function(){
                            autoNextPage();
                        });
                        //点击下一页 上一页的功能
                        $('.left').click(function(){
                            nextPage(true);
                        });
                        $('.right').click(function(){
                            nextPage(false);
                        });
                        //小圆点的相应功能 事件委托
                        clickButtons();
                        function clickButtons(){
                            var length = buttonSpan.length;
                            for(var i=0;i<length;i++){
                                buttonSpan[i].onclick = function(){
                                    $(buttonSpan[index-1]).removeClass('on');
                                    if($(this).attr('index')==1){
                                        index = 5;
                                    }else{
                                        index = $(this).attr('index')-1;
                                    }
                                    nextPage(true);

                                };
                            }
                        }
                        function nextPage(next){
                            var targetLeft = 0;
                            //当前的圆点去掉on样式
                            $(buttonSpan[index-1]).removeClass('on');
                            if(next){//往后走
                                if(index == 5){//到最后一张，直接跳到第一张
                                    targetLeft = 0;
                                    index = 1;
                                }else{
                                    index++;
                                    targetLeft = -600*(index-1);
                                }

                            }else{//往前走
                                if(index == 1){//在第一张，直接跳到第五张
                                    index = 5;
                                    targetLeft = -600*(imgCount-1);
                                }else{
                                    index--;
                                    targetLeft = -600*(index-1);
                                }

                            }
                            $('.list').animate({left:targetLeft+'px'});
                            //更新后的圆点加上样式
                            $(buttonSpan[index-1]).addClass('on');


                        }


                    </script>





                </div>
                        <h2>陌上花开</h2>
                        <h6>限时折扣78%</h6>
                        <button class="topbtn">立即抢购<span class="glyphicon glyphicon-send"></span></button>
             <div>
         </div>
    </section>
</div>

<div class="top1" style="display: none">
    <p>精品水果</p>
    <div class="tab_list">
        <ul>
            <li><button type="button" style="background-color:#ffffff;" class="btn btn2">水果皇后</button></li>
            <li><button type="button" style="background-color:#fff;" class="btn btn2">水果皇后</button></li>
            <li><button type="button" style="background-color:#fff;" class="btn btn2">水果皇后</button></li>
            <li><button type="button" style="background-color:#fff;" class="btn btn2">水果皇后</button></li>
            <li><button type="button" style="background-color:#fff;" class="btn btn2">水果皇后</button></li>
        </ul>
    </div>
    <div class="show">
        hello
    </div>
    <h2>陌上花开</h2>
    <h6></h6>
    <button class="topbtn">立即抢购 <span class="glyphicon glyphicon-send"></span></button>
</div>

<?php/*
include "utils/girl.php";
include "utils/footer.php";
*/
?>
</body>
</html>