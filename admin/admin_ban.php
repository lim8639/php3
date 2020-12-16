
<link href="css/admin_ban.css" rel="stylesheet">
<?php
include "top.php";
include"conn.php";
//$adminnum=$_POST["adminnum"];

//$sql=" select * from tab_user where customernum = $adminnum and isadmin='1'";
//$result=mysqli_query($conn,$sql);
//if(mysqli_num_rows($result)>0 && $_SERVER["REQUEST_METHOD"]=="POST")
//{


//$sql1="delete * from tab_user where customernum = $adminnum and isadmin='1'";

//echo  "<script language='JavaScript' type='text/JavaScript'>;";
  //// echo "alert('解除成功');";
   //echo "location.href='order_admin.php';";
//echo "</script>";
//}
//else{
  //echo  "<script language='JavaScript' type='text/JavaScript'>;";
 //echo "alert('解除失败 请重新输入并确认管理员编号正确');";
//echo "location.href='order_admin.php';";
 //echo "</script>";
//}
?>

<div class="ban">
<div class="banform">
<form action="" method="post" enctype="multipart/form-data" name="form" class="banform">
<table>
<tr>
    <td>
    <input type="text" name="adminnum" style="width: 225px" />
    </td>
    <td>
        <input type="submit" value="解除管理员权限" />
    </td>
</tr>
    <tr>
        <th>
            <p style="color: #0000cc">请输入要解除权限的管理员编号</p>
        </th>
    </tr>

</table>
 </form>
</div>
</div>

