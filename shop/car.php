<?php

 // 不登录不允许使用购物车操作
include "../verfication/usersession.php";

include "../utils/dao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"&&!empty($_POST['action'])) {
    // 就是要把所有的值传入类中,如果出现问题再另外说，才能同时兼容多个功能，增加代码复用
    $action = $_POST['action'];

    switch ($action){
        case 'queryListCar':
            queryListCar($conn);
            break;
        case 'addOneCar':
            addOneCar();


    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"&&!empty($_GET['action'])){
    if ($_GET['action']=='logout'){

    }
}else{

}

function queryListCar(){
    $sql = "select * from tab_car";
    $rec = queryList($sql);
    // $rec = array("hello","world");
    echo json_encode($rec,JSON_UNESCAPED_UNICODE);
}
function addOneCar($con){
   $uid = $_SESSION['username'];
   $moditynum = $_POST['moditynum'];
   $sql = "select * from tab_modity where moditynum = $moditynum;";
   $res= queryOneRecord($con,$sql);
   return json_encode($res,JSON_UNESCAPED_UNICODE);
  // changeRecord($conn,$sql);
}

function addCar(){

}
function deleteCar(){

}
function deleteAllCar(){

}
?>