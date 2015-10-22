<?php

$post_ =array (
    'author' => 'Gonn',
    'mail'=>'gonn@nowamagic.net',
    'url'=>'http://www.nowamagic.net/',
    'text'=>'欢迎访问简明现代魔法');

$data=http_build_query($post_);

// $fp = fsockopen("localhost", 80, $errno, $errstr, 5);
$fp = stream_socket_client("tcp://localhost:80", $errno, $errstr, 3);

$out="GET http://localhost/feeyobin/tmp.php HTTP/1.1\r\n";
$out.="Host: typecho.org\r\n";
$out.="User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; zh-CN; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13"."\r\n";
$out.="Content-type: application/x-www-form-urlencoded\r\n";
$out.="Cookie: PHPSESSID=082b0cc33cc7e6df1f87502c456c3eb0\r\n";
$out.="Content-Length: " . strlen($data) . "\r\n";
$out.="Connection: close\r\n\r\n";
$out.=$data."\r\n\r\n";

fwrite($fp, $out);
while (!feof($fp))
{
    echo fgets($fp, 1280);
}

fclose($fp);