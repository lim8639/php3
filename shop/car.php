<?php

// 不登录不允许使用购物车操作
include "../verfication/usersession.php";
include "../utils/conn.php";
include "../utils/dao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"&&!empty($_POST['action'])) {
    // 就是要把所有的值传入类中,如果出现问题再另外说，才能同时兼容多个功能，增加代码复用
    $action = $_POST['action'];
    switch ($action){
        case 'queryListCar':
            queryListCar($conn);
            break;
        case 'addOneCar':
            addOneCar($conn);

    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"&&!empty($_GET['action'])){
    $uid = $_SESSION['username'];
    $gid = $_GET['gid'];
    if ($_GET['action']=='delete'){
       deleteCar($uid,$gid);
    }elseif ($_GET['action']=='deleteall'){
       deleteAllCar($uid);
    }
}else{
    echo "<h1>你这是请求吗，请个锤子</h1>";
}

function queryListCar($conn){
    $uid = $_SESSION['username'];
    $sql = "select * from tab_shop where $uid";
    $rec = queryList($conn,$sql);
    // $rec = array("hello","world");
    echo json_encode($rec,JSON_UNESCAPED_UNICODE);
}

/**
 * @param $conn 添加一个商品到购物车
 */
function addOneCar($conn){
   $uid = $_SESSION['username'];
   $moditynum = $_POST['moditynum'];
   $sql = "select * from tab_modity where moditynum = 1001;";
   $modity = queryOneRecord($conn,$sql);
   $modityname = $modity['modityname'];
   $picture = $modity['picture'];
   $shopnum = $_POST['shopnum'];
   $insert = "INSERT INTO tab_shop
    (customernum, moditynum, modityname, picture, shopnum)
    VALUES ($uid, $moditynum, '$modityname', '$picture', $shopnum);";
    // echo json_encode(array("hello","world"));
   //    输出数据要用echo
    //echo json_encode($modity,JSON_UNESCAPED_UNICODE);
    if (changeRecord($conn,$insert)){
        echo 1;
    }else{
        echo 0;
    }
}

function deleteCar($uid,$gid){
    $sql = "delete from tab_shop where customernum =$uid and moditynum =$gid;";
     if (changeRecord($conn,$sql)){
         echo 1;
     }else{
         echo 0;
     }
}

function deleteAllCar($uid){
    $sql = "delete from tab_shop where customernum =$uid;";
    if (changeRecord($sql)){
        echo 1;
    }else{
        echo 0;
    }
}
?>