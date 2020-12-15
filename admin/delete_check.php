<?php
$moditynum=$_GET['moditynum'];
include "conn/conn.php";
$sql="delete from tab_modity where moditynum=$moditynum";
$result1=mysqli_query($conn,$sql) or die("删除失败".$sql);
echo "<script language='javascript' type='text/javascript'>";
echo "alert('商品删除成功');";
echo "</script>";
header("location:deletemodity.php");
?>
