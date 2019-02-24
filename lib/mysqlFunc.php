<?php
/**
 *Date:2019/2/19
 *Time:17:20
 */
require_once '../config/config.php';
/**
 * 数据库连接
 * @return mysqli
 */
function connect()
{
   $link = mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME);
   if(!$link)
       die('数据库连接失败：'.mysqli_error($link));
    mysqli_set_charset($link,DB_CHARSET);
    return $link;
}

/**
 * 插入一条数据
 * @param $table
 * @param $array
 * @return bool|int|string
 */
function insert($table,$array)
{
    $link = connect();
    $keys = implode(',',array_keys($array));
    $values = '\''.implode('\',\'',array_values($array)).'\'';
    $sql = 'INSERT INTO '.$table.' ('.$keys.')'.' VALUES ('.$values.')';
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_insert_id($link);
    }else{
        //抛出异常
        // die(mysqli_error($link));
        return false;
    }
}

/**
 * 删除记录
 * @param $table
 * @param null $where
 * @return bool|int
 */
function delete($table,$where = null)
{
    $link = connect();
    $where = $where == null ? '' : ' WHERE '.$where;
    $sql = 'DELETE FROM '.$table.$where;
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        //抛出异常
        // die(mysqli_error($link));
        return false;
    }
}

/**
 * 更新一条记录
 * @param $table
 * @param $array
 * @param $where
 * @return int
 */
function update($table,$array,$where)
{
    $link = connect();
    $str = '';
    foreach($array as $key => $value){
        $str .= ',' . $key . '=\'' . $value.'\'';
    }
    $str = substr($str,1);
    $sql = 'UPDATE '.$table.' SET '.$str.' WHERE '.$where;
    $result = mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        //抛出异常
        // die(mysqli_error($link));
        return false;
    }
}

/**
 * 查询一条记录
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchOne($sql,$result_type = MYSQLI_ASSOC)
{
    $link = connect();
    $result = mysqli_query($link,$sql);
    if($result){
        $res = mysqli_fetch_array($result,$result_type);
        return $res;
    }else{
        //抛出异常
        // die(mysqli_error($link));
        return false;
    }
}

/**
 * 查询结果集所有记录
 * @param $sql
 * @param int $result_type
 * @return array|null
 */
function fetchAll($sql,$result_type = MYSQLI_ASSOC)
{
    $link = connect();
    $result = mysqli_query($link,$sql);
    if($result){
        $res = mysqli_fetch_all($result,$result_type);
        return $res;
    }else{
        //抛出异常
        // die(mysqli_error($link));
        return false;
    }
}