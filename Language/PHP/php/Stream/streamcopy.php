<?php
$src = fopen('http://www.baidu.com', 'r');
$dest = fopen('first.txt', 'w');
$dest1 = fopen('first1.txt', 'w');

echo stream_copy_to_stream($src, $dest, 1024), "\r\n";
echo stream_copy_to_stream($src, $dest1);