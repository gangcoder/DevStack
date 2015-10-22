<?php
$alternate_opts  = array(
   'http' =>array(
     'method' => "POST" ,
     'header' => "Content-type: application/x-www-form-urlencoded\r\n"  .
               "Content-length: "  .  strlen ( "baz=bomb" ),
     'content' => "baz=bomb"
   )
);

$default  =  stream_context_get_default ( $alternate_opts );

print_r(stream_context_get_options($default));

print_r(stream_context_get_params($default));