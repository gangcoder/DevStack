<?php
ob_start();
foreach (range(1, 40) as $key => $value) {
    echo str_repeat(' ', 10240), $value, "<br/>";
    ob_flush();
    sleep(1);
}
ob_end_flush();