<?php
/**
 *Date:2019/2/19
 *Time:15:55
 */
/**
 * 生成随机字符串
 * @param int $type
 * @param int $length
 * @return bool|string
 */
function getRandomString($type = 1,$length = 4)
{
    if($type == 1){
        $chars = implode('',range(0,9));
    }elseif($type == 2){
        $chars = implode('',array_merge(range('a','z'),range('A','Z')));
    }else{
        $chars = implode('',array_merge(range(0,9),range('a','z'),range('A','Z')));
    }
    //验证码长度最大与生成字符串相同
    if($length > strlen($chars)){
        $length = strlen($chars);
    }
    $chars = str_shuffle($chars);
    return substr($chars,0,$length);
}
