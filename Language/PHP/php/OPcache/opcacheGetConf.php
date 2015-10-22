<?php

echo opcache_compile_file('D:\git\programmer\PHP\tmp.php');

print_r(opcache_get_status());