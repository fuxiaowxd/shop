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
/**
 * 添加管理员
 */
function addAdmin()
{
    $arr = $_POST;
    //密码加密
    $arr['password'] = md5($arr['password']);
    //创建时间
    $arr['create_time'] = time();
    $result = insert('admin_user',$arr);
    if($result){
        $mes = "添加成功<br/> <a href='addAdmin.php'>继续添加</a> | <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "添加失败<br/> <a href='addAdmin.php'>重新添加</a>";
    }
    return $mes;
}

/**
 * 获取管理员列表
 */
function getAllAdmin()
{
    $sql = 'SELECT `id`,`name`,`email` FROM admin_user';
    $result = fetchAll($sql);
    return $result;
}

/**
 * 编辑管理员
 */
function editAdmin($id)
{
    $arr = $_POST;
    //对比密码是否有改动
    $admin = fetchOne("SELECT *FROM admin_user WHERE id={$id}");
    if($arr['password'] == $admin['password']){
        unset($arr['password']);
    }else{
        $arr['password'] = md5($arr['password']);
    }
    $where = 'id='.$id;
    $result = update('admin_user',$arr,$where);
    if($result){
        $mes = "编辑成功<br/><a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "编辑失败<br/><a href='listAdmin.php'>请重新修改</a>";
    }
    return $mes;
}

/**
 * 删除管理员
 */
function delAdmin($id)
{
    $result = delete('admin_user',"id={$id}");
    if($result){
        $mes = "删除成功<br/> <a href='listAdmin.php'>查看管理员列表</a>";
    }else{
        $mes = "删除失败<br/> <a href='listAdmin.php'>请重新删除</a>";
    }
    return $mes;
}