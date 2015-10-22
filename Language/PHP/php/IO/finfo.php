<?php
$finfo  = new  finfo ( FILEINFO_MIME ,  "/usr/share/misc/magic" );  // 返回 mime 类型

/* get mime-type for a specific file */
 $filename  =  "/usr/local/something.txt" ;
echo  $finfo -> file ( $filename );

 ?> 