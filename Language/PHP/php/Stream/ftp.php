<?php
$opts  = array(
     'socket'  => array(
         'bindto'  =>  '192.168.0.100:0' ,
    ),
);


 // connect to the internet using the '192.168.0.100' IP and port '7000'
 $opts  = array(
     'socket'  => array(
         'bindto'  =>  '192.168.0.100:7000' ,
    ),
);


 // connect to the internet using port '7000'
 $opts  = array(
     'socket'  => array(
         'bindto'  =>  '0:7000' ,
    ),
);
print_r($opts);