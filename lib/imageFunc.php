<?php
/**
 *Date:2019/2/19
 *Time:15:55
 */

require_once 'stringFunc.php';

function getVerifyImage($type = 1,$length = 4,$pixel = 0,$line = 0,$sess_name = 'verify')
{
    $width = 100;
    $height = 30;
    //创建画布
    $img = imagecreatetruecolor($width,$height);
    //添加颜色
    $white = imagecolorallocate($img,255,255,255);
    $black = imagecolorallocate($img,0,0,0);
    //填充背景
    imagefilledrectangle($img,1,1,$width-2,$height-2,$white);

//    $fonts = array('arial.ttf','ARIALN.TTF','ariblk.ttf','corbelb.ttf','pala.ttf','simfang.ttf','simkai.ttf','STKAITI.TTF');
    $fonts = 'simkai.ttf';//字体暂时只保存一个使用
    //获取验证码并存入session
    $string = getRandomString($type,$length);
    $_SESSION[$sess_name] = $string;
    //验证码写入图片
    for($i = 0;$i < $length;$i++){
        $size = mt_rand(15,18);
        $angle = mt_rand(-20,20);
        $startx = 10+$i*$size;
        $starty = mt_rand(22,28);
        $font = '../font/'.$fonts;
        $color = imagecolorallocate($img,mt_rand(20,90),mt_rand(80,120),mt_rand(90,180));
        imagettftext($img,$size,$angle,$startx,$starty,$color,$font,substr($string,$i,1));
    }

    if($pixel){
        for($i = 0;$i < $pixel;$i++){
            imagesetpixel($img,mt_rand(1,$width-1),mt_rand(1,$height-1),$black);
        }
    }

    if($line){
        for($i = 0;$i < $line;$i++){
            imageline($img,mt_rand(0,$width-1),mt_rand(0,$height-1),mt_rand(0,$width-1),mt_rand(0,$height-1),$black);
        }
    }

    header('Content-type:image/gif');
    imagegif($img);
    imagedestroy($img);
}