<?php

$customernum = $_GET["customernum"];
include "conn.php";
$sql = "delete from tab_user where customernum='$customernum'";
$result = mysqli_query($conn, $sql) or die("删除失败" . $sql);
//错误的时候停止并且输出sql语句
header("location:user_admin.php");


?>