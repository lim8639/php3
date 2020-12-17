<?php
$p1 =$_POST['p1'];
$p2 =$_POST['p2'];
$p3 =$_POST['p3'];
$email =$_POST['email'];
include "../utils/conn.php";
include "../utils/dao.php";
session_start();
$id=$_SESSION['username'];
$sql="select * from tab_user where customernum ='$id';";
$res=queryOneRecord($conn,$sql);
//print_r($res);
/* 1.后端先拿到前端的值
 2.拿数据库的值
 3.比较值？允许修改：echo*/
password_hash($p1);
$res['password'];
if(password_hash($p1)!=$res['password'])
{
    header('location:user.php');
}else if (password_hash($p1)==$res['password']){

    if (!empty($p2)&&!empty($p3))
{
    if($p2==$p3){
        $sql1="update tab_user set password='$p3' where customernum='$id';";
        $res=queryOneRecord($conn,$sql1);
    }
}else if(!empty(email))
{
    $sql2="update tab_user set email='$email' where customernum='$id'";
}
}

?>
