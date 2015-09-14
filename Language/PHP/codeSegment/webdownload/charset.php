<?php
$handle = opendir('./');
while (false !== ($file = readdir($handle))){
    if (pathinfo('./'.$file)['extension'] == 'htm') {
        $content = file_get_contents('./'.$file);
        $content = preg_replace('|"_(\d*.htm)"|U', '${1}' , $content);
        $statu = file_put_contents('./'.$file, $content);
        if ($statu != false) {
            echo $file."success\n";
        }
    }
}