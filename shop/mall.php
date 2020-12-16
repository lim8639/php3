<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商城页面</title>
    <link rel="shortcut icon" href="../asset/src/icon/favicon.ico">
    <link rel="stylesheet" href="../asset/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mall.css">
    <link rel="stylesheet" href="../asset/css/frame.css">
    <link rel="stylesheet" href="../utils/car.css">
    <script src="../asset/bootstrap-3.3.7-dist/jquery/jquery-3.5.1.min.js"></script>
    <script src="../asset/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body>
<header>
</header>
<div class="container">
    <div class="row">
        <div class="daohang">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <nav class="navbar navbar-default">
                            <div class="container-fluid" style="width: 171.1px">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="#">
                                        <img src="../asset/src/img2/logo.png">
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"">
                    <ul class="nav navbar-nav">
                        <li><a href="#hot"><span class="glyphicon glyphicon-time"></span>限时特卖<span class="sr-only">(current)</span></a></li>
                        <li><a href="#fresh"><span class="glyphicon glyphicon-apple"></span>新鲜水果</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="
glyphicon glyphicon-th"></span>地区特产<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">海南</a></li>
                                <li><a href="#">广西</a></li>
                                <li><a href="#">新疆</a></li>
                                <li><a href="#">河北</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">更多地区</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="关键词">
                        </div>
                        <button type="submit" class="btn btn-default">搜索</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-phone"></span>拨打热线</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="
                                glyphicon glyphicon-user"></span>我的<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="../user/user.php">我的账户</a></li>
                                <li><a href="../user/user.php">我的订单</a></li>
                                <li><a href="../user/user.php">购物车</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="../user/user.php">更多我的</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div class="lunbo">
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
                    <img src="../asset/src/img2/86016044_p0.png">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="../asset/src/img2/86016044_p0.png">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="../asset/src/img2/86016044_p0.png">
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
    </div>
    <?php
    include "../utils/dao.php";
    include "../utils/conn.php";
    $sql = "select * from tab_modity;";
    $var = queryList($conn,$sql);
    ?>
    <div class="hot" id="hot">
        <div class="hottop">
            <h3>限时热卖</h3>
        </div>
        <div class="hotone">
            <img src="<?php echo "../admin/".$var[1]['picture']?>">
        </div>
        <div class="hotone">
            <img src="<?php echo "../admin/".$var[2]['picture']?>">
        </div>
        <div class="hotone">
            <img src="<?php echo "../admin/".$var[3]['picture']?>">
        </div>
    </div>
    <div class="new">
        <div class=" hottop">
            <h3>新鲜水果</h3>
        </div>
        <?php
        foreach ($var as $item){
            $show = "<div class=\"newone col-sm-6 col-md-3 col-xs-6 col-lg-3\">
          
            <div class=\"thumbnail\">
                <img src=\"../admin/".$item['picture']."\">
                <div class=\"caption\">
                    <h3>".$item['modityname']."</h3>
                    <p>
                        <a href=\"details.php?id=".$item['moditynum']."\" class=\"btn btn-primary\" role=\"button\">加入购物车</a>
                        <a href=\"details.php?id=".$item['moditynum']."\" class=\"btn btn-default\" role=\"button\">购买</a>
                    </p>
                </div>
            </div>
        </div>";
            echo $show;
        }
        ?>
        <!--        格式代码样例-->
        <!--        <div class="newone col-sm-6 col-md-4 ">-->
        <!--            <div class="thumbnail">-->
        <!--                <img src="img/k2.jpg">-->
        <!--                <div class="caption">-->
        <!--                    <h3>商品名称</h3>-->
        <!--                    <p>-->
        <!--                        <a href="#" class="btn btn-primary" role="button">加入购物车</a>-->
        <!--                        <a href="#" class="btn btn-default" role="button">购买</a>-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

    </div>
    <div class="kind"></div>
</div>
<div class="page">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
</div>
<?php
include "../utils/footer.php";
?>
</body>
</html>
