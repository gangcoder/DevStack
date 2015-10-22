<?php 
$str = 'abc123cba321cba32bc';
preg_match('|(cba)(\w*)(cba)|', $str, $result);
var_dump($result);