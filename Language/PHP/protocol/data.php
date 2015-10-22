<?php
$fp    =  fopen ( 'data://text/plain;base64,' ,  'r' );
 $meta  =  stream_get_meta_data ( $fp );

 // 打印 "text/plain"
 var_dump($meta);