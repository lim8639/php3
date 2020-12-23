<?php

session_start();
if (empty($_SESSION['username'])){

    /**
     * put the url into session,if exist
     */
    if(!empty($_SERVER['REQUEST_URI']))
        $_SESSION['LOGIN_REQUEST_URI']= $_SERVER['REQUEST_URI'];
    header('location:../verfication/login.php');
}

