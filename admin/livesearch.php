<?php
include "conn/conn.php";

$q=$_GET["q"];

// 如果 q 参数存在则从 xml 文件中查找数据
if (strlen($q)>0)
{   $sql="Select * from tab_modity where modityname like '%$q%'";
    $result=mysqli_query($conn,$sql) or die("查询失败，请检查SQL语句");
    $hint="";
	if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result))
    {
        
        
            
                if ($hint=="")
                {
                    $hint="<div style='width:100%;padding-left:2px;padding-right:100px;'><a href='" . 
                    "brogoods.php?key=".$row['modityname'].
                    "' target='_blank'>" . 
                    $row['modityname']. "</a></div>";
                }
                else
                {
                    $hint=$hint . "<br /><div style='width:100%;margin-top:-20px;padding-left:2px;padding-right:100px;'><a href='" . 
                    "brogoods.php?key=".$row['modityname'] .
                    "' target='_blank'>" . 
                   $row['modityname'] . "</a></div>";
                }
            
        
    }
	}
}

// 如果没找到则返回 "no suggestion"
if ($hint=="")
{
    $response="找不到相关的商品呢";
}
else
{
    $response=$hint;
}

// 输出结果
echo $response;
?>