<?php
include "conn/conn.php";
$sql="select * from tab_modity";
$result=mysqli_query($conn,$sql)or die("数据查询失败");

function filterInput($data) {
    $data = trim($data);//不必要的字符 (如：空格，tab，换行)。
    $data = stripslashes($data);//去除反斜杠 (\)
    $data = htmlspecialchars($data);//把一些预定义的字符转换为 HTML 实体

    return $data;
}
function filterInput2($data){
    $html_string = htmlspecialchars_decode($data);
    //将空格替换成空
    $content = str_replace(" ", "", $html_string);
    //函数剥去字符串中的 HTML、XML 以及 PHP 的标签,获取纯文本内容
    $contents = strip_tags($content);
    //返回字符串中的前$num字符串长度的字符
    return $contents;

}


if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $moditynum=$_POST["moditynum"];
    $modityname=$_POST["modityname"];
    $bid=$_POST["bid"];
    $sellprice=$_POST["sellprice"];
    $typename=$_POST["typename"];
    $warehouse=$_POST["warehouse"];
    $content=$_POST["content"];
    $file=$_POST["file_old"];


    $modityname=filterInput($modityname);
    $content=filterInput2($content);

    if (empty($modityname))
    {
        echo "<script>alert('名称不能为空');history.back();</script>";

    };
    if (empty($bid) or is_numeric($bid)==false)
    {
        echo "<script>alert('进价不能为空且必须为正数');history.back();</script>";
    };

    if(((int)$bid)<=0)
    {
        echo "<script>alert('进价必须为正数');history.back();</script>";
    };

    if (empty($sellprice) or is_numeric($sellprice)==false or (intval($sellprice)<=0))
    {
        echo "<script>alert('售价不能为空且必须为正数');history.back();</script>";
    };

    if(empty($warehouse) or is_numeric($warehouse)==false or intval($warehouse)<=0)
    {
        echo "<script>alert('库存不能为空且必须为正整数');history.back();</script>";
    }
    if(empty($content))
    {
        echo "<script>alert('描述不能为空');history.back();</script>";
    }



    else{

            if(isset($file))
            {$photo=$file;}
            else{$photo="";}


            if(!(empty($_FILES["file"]["name"])))
            {

                if($_FILES["file"]["error"] > 0)
                {
                    $photoErr="照片上传失败，错误号:".$_FILES["file"]["error"];
                }
                else
                {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $_FILES["file"]["name"]);
                    $photo="images/" . $_FILES["file"]["name"];
                }
            }
            date_default_timezone_set('PRC');
            $time=date('Y-m-d h:i:s', time());
            //$sql="update set tab_modity(modityname,warehouse,typename,bid,time,sellprice,picture,moditydescribe) value('$modityname',$warehouse,'$typename',$bid,'$time',$sellprice,'$photo','$content')";
            $sql="update tab_modity set modityname='$modityname',warehouse='$warehouse',typename='$typename',bid='$bid',sellprice='$sellprice',picture='$photo',moditydescribe='$content' where moditynum=$moditynum";
            $result2=mysqli_query($conn,$sql) or die("插入失败".$sql);
            echo "<script language='javascript' type='text/javascript'>";
            echo "alert('商品修改成功');";
            echo "</script>";
            header("location:brogoods.php");

         }}


?>