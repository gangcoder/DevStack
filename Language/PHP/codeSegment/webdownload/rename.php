<?php
$handle = opendir('./');
while (false !== ($file = readdir($handle))){
    if ($file == '.' || $file == '..') {
        continue;
    }
    $newname = str_replace('_', '', $file);
    $boolstatu = rename('./'.$file, $newname);
    if (!$boolstatu) {
        echo "fair\n";
    }
}