<?php
$dir = getcwd();
$dir = realpath($dir.'../../..');

$dirObj = dir($dir);

while (($file = $dirObj->read()) !== false) {
    echo "$file", "\n";
}

$dirObj->rewind();
while (($file = $dirObj->read()) !== false) {
    echo "$file", "\n";
}
$dirObj->close();