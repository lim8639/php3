<?php


// 如果收到请求，就返回一个数据

//直接echo

$value = $_POST['action'];

if ($value=='changepassword'){
    $sql = "";

    echo "修改成功";
}else{
    echo "error";
}