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
print_r($res);
print_r($p2);
//password_hash($p1,PASSWORD_DEFAULT);
/* 1.后端先拿到前端的值
 2.拿数据库的值
 3.比较值？允许修改：echo*/
//if(false)
if (empty($p1)){
    echo "<script language='javascript' type='text/javascript'>";
    echo  "alert('没有输入旧密码！');";
    echo "window.location.href ='user.php';";
    echo "</script>";
}else if (!empty($p1)){//p1不为空
    if (password_verify($p1,$res['password']))
    {//旧密码与数据库中的密码一样
        if (!empty($p2)&&!empty($p3))
        {//判断p2p3是否为空 不为空的话 判断是否相等
            if($p2==$p3)
            {
                $p33 = password_hash($p3,PASSWORD_DEFAULT);
                $sql1="update tab_user set password='$p33' where customernum='$id';";
                $res2=changeRecord($conn,$sql1);
                if (empty($email))
                {
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('修改密码成功！');";
                    echo "window.location.href ='user.php';";
                    echo "</script>";
//                    print_r($res2);
                }else if (!empty($email))
                {
                    $sql2="update tab_user set email='$email' where customernum='$id'";
                    $res3=changeRecord($conn,$sql2) or die ("修改失败".$sql2);
                    echo "<script language='javascript' type='text/javascript'>";
                    echo "alert('修改密码和邮箱成功！');";
                    echo "window.location.href ='user.php';";
                    echo "</script>";
                }
                echo "<script language='javascript' type='text/javascript'>";
                echo "alert('两次密码不同！');";
                echo "window.location.href ='user.php';";
                echo "</script>";
            }elseif ($p2!=$p3)
            {
                echo "<script language='javascript' type='text/javascript'>";
                echo "alert('两次密码不同！');";
                echo "window.location.href ='user.php';";
                echo "</script>";
            }
        }
        else
        {//p2p3不全为空
            if(!empty($email))
            {
                $sql2="update tab_user set email='$email' where customernum='$id'";
                $res3=changeRecord($conn,$sql2) or die ("修改失败".$sql2);
                echo "<script language='javascript' type='text/javascript'>";
                echo "alert('修改邮箱成功！');";
                echo "window.location.href ='user.php';";
                echo "</script>";
            }elseif (empty($email))
            {
                echo "<script language='javascript' type='text/javascript'>";
                echo "alert('请输入修改后的密码和邮箱！');";
                echo "window.location.href ='user.php';";
                echo "</script>";
            }
        }
    }else
//        if (password_hash($p1,PASSWORD_DEFAULT)!=$res['password'])
    {
    //旧密码与数据库中的密码不相同
    //      header('location:user.php');
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('密码错误,重新输入');";
        echo "window.location.href ='user.php';";
        echo "</script>";
    }
}




/**/?><!--
<script>
    $("#btn1").click(function () {
        var p1 = $("#oldpassword").val();
        if(p1==''){
            alert("没有输入旧密码");
            return false;
        }
        var p2 =  $("#confirmpassword3").val();
        var p3 = $('#newpassword2').val();
        var email = $('#exampleInputemail').val();
        // $("#confirmpassword3").attr('value',123);
        if (p2!=p3){
            alert("两次密码不相等");
            return false;
        }else if (p2!=''&&p3!=''){
            if(p2==p3){
                if (email!=''){
                    alert("密码和邮箱修改成功");
                    return false;
                }else {
                    alert("密码修改成功");
                    return false;
                }

            }
        }else if (p2==''&&p3==''){
            if (email!=''){
                alert("邮箱修改成功");
                return false;
            }else {
                alert("请输入修改后的密码或邮箱");
                return false;
            }
        }



    });
</script>-->
