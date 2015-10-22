<?php
header('Content-type:text/html;charset=utf-8');

function substr_utf8($str, $start, $length = null)
{
    $arr = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
    var_dump($arr);
}

$str = '传智播客PHP学院';
substr_utf8($str);