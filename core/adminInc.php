<?php
/**
 *Date:2019/2/20
 *Time:9:16
 */

/**
 * 检查是否已登录
 */
function checkLogin()
{
    if(empty($_SESSION['adminId']) && empty($_COOKIE['adminId'])){
        alertMsg('请先登录！','login.php');
    }
}

/**
 * 退出登录
 */
function logout()
{
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),'',time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie('adminId','',time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie('adminName','',time()-1);
    }
    session_destroy();
    header('location:login.php');
}