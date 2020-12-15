<?php
// 查看数据库是否支持  myslqli
//
 // phpinfo();
try {
   //  $db = empty($GLOBALS['database'])? " success":"hello";
    $conn =  new mysqli('123.56.1.58','myphp','hYsDmwyFt8MDmjwh','myphp',3306);
   // if (empty($db))
    if ($conn->error){
        error_log("请连接网络，自动连接云端数据库",   3,   "errors.log");
    }else{
        //echo "Database is connecting successfully!";
    }
}catch (Exception $exception){
    exit($exception);
}?>
