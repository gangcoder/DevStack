<?php
$handle = popen("/bin/ls", "r");
$read = fread($handle, 10240);
echo $read;
