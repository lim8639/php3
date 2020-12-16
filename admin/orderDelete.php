<?php
$ordernum=$_GET["ordernum"];
include"conn.php";
$sql="delete from tab_order where ordernum='$ordernum'";
$result=mysqli_query($conn,$sql) or die("删除失败".$sql);
//错误的时候停止并且输出sql语句
header("location:order_browse.php");


?>
