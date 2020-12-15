<?php
include_once("conn/conn.php");
    $user_name=$_POST["user_name"];
    $user_pass=$_POST["user_pass"];
	$sql="Select * from tab_user where account='$user_name'"; 
	$result=mysqli_query($conn,$sql) or die("查询失败，请检查SQL语句");
	if(mysqli_num_rows($result)>0)
    {
		$row=mysqli_fetch_assoc($result);
		if (password_verify($user_pass,$row['password']))
				{session_start();
            	$_SESSION["user"]=$user_name;
	     		header("location:brogoods.php");
				}
			else
			{ echo  "<script language='JavaScript' type='text/JavaScript'>;";  
			 echo "alert('密码不正确');";
			 echo "location.href='index.php';";
			 echo "</script>";
			 }
	}
else
    {echo  "<script language='JavaScript' type='text/JavaScript'>;";  
     echo "alert('用户名不正确');";
     echo "location.href='index.php';";
	 echo "</script>";
	 }
?>