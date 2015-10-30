<?php


require './WeChat.class.php';
define('APPID', 'wxe647b92b9dc39f1b');
define('APPSECRET', 'e16374d53b5b78bf25fd7e29e3d58c46');
define('TOKEN', 'itcast_php34');
$wechat = new WeChat(APPID, APPSECRET, TOKEN);

$wechat->getQRCode(42, NULL);