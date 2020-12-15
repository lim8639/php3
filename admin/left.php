<div class="left">

    <script type="text/javascript">
        var myMenu;
        window.onload = function() {
            myMenu = new SDMenu("my_menu");
            myMenu.init();
        };
    </script>

    <div id="my_menu" class="sdmenu">
        <div >
            <span>管理设置</span>
            <a href="">修改密码</a>
        </div>
        <div class="collapsed">
            <span>商品管理</span>
            <a href="addgoods.php">添加商品</a>
            <a href="brogoods.php">浏览商品</a>
            <a href="updatemodity.php">修改商品</a>
            <a href="deletemodity.php">删除商品</a>
        </div>
        <div class="collapsed">
            <span>类别管理</span>
            <a href="addtype.php">添加类别</a>
            <a href="">修改类别</a>
        </div>
        <div class="collapsed">
            <span>用户管理</span>
            <a href="">账号封禁</a>
            <a href="">管理员管理</a>
        </div>
        <div class="collapsed">
            <span>订单管理</span>
            <a href="">查看订单</a>
            <a href="">管理订单</a>
        </div>
        <div class="collapsed">
            <span>公告管理</span>
            <a href="">添加公告</a>
            <a href="">公告列表</a>

        </div>

    </div>

</div>
