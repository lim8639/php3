<?php
session_start();
$p1 = $_POST['p1'];

$p3 = $_POST['p3'];

include "../utils/conn.php";
include "../utils/dao.php";
$id = $_SESSION['username'];

$sql = "select * from tab_user where customernum = $id";

$res  = queryOneRecord($conn,$sql);
if(password_verify($p1,$res['password'])){
     $sql2 = "update * ";
}else{
    header('location:user?msg=error');
}
