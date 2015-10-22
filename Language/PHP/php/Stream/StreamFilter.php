<?php
$fp = fopen('test.txt', 'w+');

/* 把rot13过滤器作用在写入流上 */
stream_filter_append($fp, "string.rot13", STREAM_FILTER_ALL);

/* 写入的数据经过rot13过滤器的处理*/
fwrite($fp, "This is a test\n");
rewind($fp);

/* 读取写入的数据，独到的自然是被处理过的字符了 */
fpassthru($fp);
fclose($fp);

// output：Guvf vf n grfg
