<?php
function captcha($width=80,$high=25,$num=4,$line_num=10,$snow_num=50){
    header('Content-Type:image/png');
    session_start();
    //生成随机数字＋字母
    for($a = 0;$a < $num;$a++){
         $code .= dechex(mt_rand(0, 15));//dechex — 十进制转换为十六进制
    }

    //把生成的验证码保存在SESSION超级全局数组中
    $_SESSION['captcha'] = $code;

    //创建画布
    $img = imagecreatetruecolor($width,$high);

    //填充背景色为白色
    $backcolor = imagecolorallocate($img, '255', '255', '255');
    imagefill($img, '0', '0', $backcolor);

    //添加黑色边框
    $bordercolor = imagecolorallocate($img, 0, 0, 0);
    imagerectangle($img, 0, 0, $width-1, $high-1, $bordercolor);

    //随机画线条
    for($i=0;$i<$line_num;$i++){
         imageline($img, mt_rand(0, $width*0.1), mt_rand(0, $high), mt_rand($width*0.9, $width), mt_rand(0, $high),
         imagecolorallocate($img, mt_rand(150, 255), mt_rand(150, 255), mt_rand(150, 255)));
    }

    //随机打雪花
    for ($i=0;$i<$snow_num;$i++){
        imagechar($img,1, mt_rand(0, $width), mt_rand(0, $high),'*',
        imagecolorallocate($img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255)));
    }

    //画验证码
    for ($b = 0;$b < strlen($_SESSION['captcha']);$b++){
        imagechar($img,5, $b*$width/$num+mt_rand(5,10), mt_rand(2, $high/2),$_SESSION['captcha'][$b],
        imagecolorallocate($img, mt_rand(10, 150), mt_rand(10, 150), mt_rand(0, 100)));
    }
    ob_clean();//清空输出缓冲区
    imagepng($img);
    imagedestroy($img);
}