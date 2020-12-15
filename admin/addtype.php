<?php
include "top.php";
include "conn/conn.php";
?>
<style>
.div_middle{
    position: absolute;
    top:30%;left:50%; transform:translate(-50%,-50%);
}
</style>
<?php

function filterInput($data) {
    $data = trim($data);//不必要的字符 (如：空格，tab，换行)。
    $data = stripslashes($data);//去除反斜杠 (\)
    $data = htmlspecialchars($data);//把一些预定义的字符转换为 HTML 实体

    return $data;
}

if($_SERVER['REQUEST_METHOD']=="POST") {
    $typename = $_POST['typename'];
    $typename=filterInput($typename);
    $sql = "select * from tab_type where typename='$typename' ";
    $result = mysqli_query($conn, $sql) or die("查询失败，请检查SQL语句");
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('类型名称重复');history.back();</script>";
    }
    else
        {
            $sql = "insert into tab_type(typenum,typename) value(null,'$typename')";
            $result = mysqli_query($conn, $sql) or die("插入失败，请检查SQL语句");
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('类型添加成功');";
            echo "</script>";
    }


}
?>
?>
<div class="right">


    <div class="div_middle">
    <form action="" method="POST" >
    <div class="input-group" style="float: left">
        <input type="text" class="form-control" placeholder="请输入你要添加的类别名称" name="typename">
        <span class="input-group-btn">
        <input class="btn btn-default" type="submit">
      </span>
    </div>
    </form>
    </div>

</div>