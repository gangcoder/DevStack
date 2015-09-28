<?php


require './WeChat.class.php';

define('APPID', 'wxe647b92b9dc39f1b');
define('APPSECRET', 'e16374d53b5b78bf25fd7e29e3d58c46');
$wechat = new WeChat(APPID, APPSECRET);

// $access_token = $wechat->getAccessToken();
// var_dump($access_token);

// $wechat->getQRCode(1234, './1234.jpg', WeChat::QRCODE_TYPE_TEMP);

// $wechat->getQRCodeTicket(1234, 1);
// $wechat->getQRCodeTicket('http://php.itcast.cn/', 3);

