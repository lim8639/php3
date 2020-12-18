<?php

include "../verfication/usersession.php";
include "../utils/conn.php";
include "../utils/dao.php";

if (empty($_POST['adrr'])){
    header("location:order.php");
}

// 新建一个订单表
//查询购物地址
date_default_timezone_set("PRC");

$ordertime = date("Y-m-d H:m:s");
$uid = $_SESSION['username'];
$addressnum  = $_POST['adrr'];

$sql1 ="INSERT INTO tab_book (ordertime, status, customernum,addressnum) 
values ('$ordertime',1,$uid,1);";
if (changeRecord($conn,$sql1)){
//    echo "这里有问题吗2";
    $oid_Sql ="select oid from tab_book where ordertime ='$ordertime' and customernum ='$uid';";
    $oid = queryOneRecord($conn,$oid_Sql);
    if (!empty($oid['oid'])){
         $sql_car = "select moditynum from tab_shop where customernum = $uid;";
          $res = queryList($conn,$sql_car);
          $oiid = $oid['oid'];
           $sql11="";

          foreach ($res as $item){

              $var = $item['moditynum'];
              echo $oiid."+".$var;
              echo "<br>";
              $sql11="INSERT INTO tab_mo (oid, mid) VALUES ($oiid,$var);";
              if (changeRecord($conn,$sql11)){
                  echo "提交成功";
              }
          }
               $sql="delete from tab_shop where customernum = $uid";
          if (changeRecord($conn,$sql))
               header('location:../user/user.php');
    }
}
// 2.查询用户的购物车,提交全部的购物车数据


