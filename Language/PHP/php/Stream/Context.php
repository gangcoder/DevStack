<?php
$post_ =array (
    'author' => 'Gonn',
    'mail'=>'gonn@nowamagic.net',
    'url'=>'http://www.nowamagic.net/',
    'text'=>'欢迎访问简明现代魔法');

$data=http_build_query($post_);

$opts = array (
    'http'=>array(
       'method' => 'POST',
       'header'=> "Content-type: application/x-www-form-urlencoded\r\n" .
                  "Content-Length: " . strlen($data) . "\r\n",
       'content' => $data)
);

$context = stream_context_create($opts);
$str = file_get_contents('http://localhost/feeyobin/tmp.php', false, $context);
echo $str;