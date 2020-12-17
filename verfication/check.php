<?php
include "../utils/conn.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"&&!empty($_POST['action'])) {
    // 就是要把所有的值传入类中,如果出现问题再另外说，才能同时兼容多个功能，增加代码复用
    $action = $_POST['action'];
    $account =  empty($_POST['username']) ? '' : $_POST['username'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
    $email = empty($_POST['email']) ? '' : $_POST['email'];
    switch ($action){
        case 'login':
            include "utils/conn.php";
            login($account,$password,$conn);
            break;
        case 'reg':
            reg($account,$password,$conn,$email);
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET"&&!empty($_GET['action'])){
     if ($_GET['action']=='logout'){
         logout();
     }
}else{

}

function login($account,$password,$conn){
   $sql = "select * from  tab_user where account = '$account';";
   $rec = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($rec);
    if (password_verify($password,$row['password'])){
        // 保存用户id的session
        // 我存的居然是用户名
        $_SESSION['username'] = $row['customernum'];
        if(!empty($_SESSION['LOGIN_REQUEST_URI'])){
            header('location:'.$_SESSION['LOGIN_REQUEST_URI']);
        }else{
           header('location:../user/user.php');
        }
    }else{
        header('location:login.php?msg=error');
    }
}

function reg($account,$password,$conn,$email){

    $sqlcheck = "select * from tab_user where account='$account'";
    $checkres = mysqli_query($conn,$sqlcheck);
    $row = mysqli_fetch_assoc($checkres);
    if ($row==null){
        $encode_pswd =  password_hash($password,PASSWORD_DEFAULT);
        $sql ="INSERT INTO tab_user (account, password, email) values ('$account','$encode_pswd', '$email');";
        $rec = mysqli_query($conn,$sql);
        if ($rec!=false){
            header('location:login.php');
        }else{
            header('location:reg.php');
        }
    }else{
        // 后期回来修改
        header('location:reg.php?msg=该用户名已被使用');
    }
}

function logout(){
    unset($_SESSION['username']);
    header("location:../index.php");
}

function detory($account){
    $sql ="delete from tab_user where account = '$account';";
    $rec = mysqli_query($conn,$sql);
    if ($rec!=false){
        header("location:../index.php");
    }
}