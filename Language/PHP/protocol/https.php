<?php

$url = 'http://www.baidu.com';
$fp = fopen($url, 'r');
$meta_data = stream_get_meta_data($fp);

var_dump($meta_data);die();
foreach ( $meta_data [ 'wrapper_data' ] as  $response ) {

     /* 我们是否被重定向了？ */
     if ( strtolower ( substr ( $response ,  0 ,  10 )) ==  'location: ' ) {

         /* 更新我们被重定向后的 $url */
         $url  =  substr ( $response ,  10 );
    }
}