<?php
/**
 *Date:2019/2/20
 *Time:13:54
 */

require_once '../include.php';

$verify = trim($_POST['verify']);
$userName = $_POST['username'];
$userName = addslashes(trim($userName));
$password = md5(trim($_POST['password']));
$verify1 = $_SESSION['verify'];

if($verify == $verify1){
    $sql = "SELECT *FROM admin_user WHERE name ='{$userName}'";
    $user = fetchOne($sql);
    if(!$user){
        alertMsg('管理员账号不正确，请重新输入！','login.php');
    }elseif ($password != $user['password']){
        alertMsg('密码不正确，请重新输入！','login.php');
    }else{
        if($_POST['autoLogin']){
            setcookie('adminId',$user['id'],time()+7*24*3600);
            setcookie('adminName',$user['name'],time()+7*24*3600);
        }
        $_SESSION['adminId'] = $user['id'];
        $_SESSION['adminName'] = $user['name'];
        alertMsg('登录成功！','index.php');
    }
}else{
    alertMsg('验证码错误！','login.php');
}




