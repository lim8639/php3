<?php
function filterInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


include_once("conn/conn.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{	$user_name=$_POST["user_name"];
    $user_pass=$_POST["user_pass"];
    $user_pass2=$_POST["user_pass2"];
    $user_email=$_POST["user_email"];
    $user_name=filterInput($user_name);
    $user_pass=filterInput($user_pass);

    if (isset($_POST["user_name"]) and isset($_POST["user_pass"]) and $_POST["user_email"])
    {

        if (!(preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/", $user_email)))
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('邮箱不规范');";
            echo  "window.location.href='register.php'";
            echo "</script>";
        }
        if($user_pass!=$user_pass2)
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('两次输入的密码不一致');";
            echo  "window.location.href='register.php'";
            echo "</script>";
        }






        $sql="select * from tab_user where account='$user_name' ";

        $result=mysqli_query($conn,$sql) or die("查询失败，请检查SQL语法");
        if(mysqli_num_rows($result)>0)
        {
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('用户已经注册，请设置其他用户名');";
            echo  "window.location.href='register.php'";
            echo "</script>";
        }
        else
        {
            $pass_hash=password_hash($user_pass,PASSWORD_DEFAULT);
            $sql="insert into tab_user(account,password,email,isadmin) values('$user_name','$pass_hash','$user_email',1)";

            $result=mysqli_query($conn,$sql) or die("插入失败，请检查SQL语法");

            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('用户注册成功');";
            echo  "window.location.href='index.php'";
            echo "</script>";


        }
    }
    if(empty($_POST["user_name"]) or empty($_POST["user_pass"]) or empty($_POST["user_email"]))
    {
        echo "<script language='javascript' type='text/javascript'>";
        echo "alert('各项值均不能为空');";
        echo  "window.location.href='register.php'";
        echo "</script>";
    }
}
?>