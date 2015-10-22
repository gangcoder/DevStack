<?php
$dirRoot = getcwd();

$dh = opendir($dirRoot);

// 获取文件列表
$files = array();
while (($file = readdir($dh)) !== false) {
    if (fnmatch('*_new.php', $file)) {
        $files[] = $file;
    }
}
closedir($dh);

// 获取文件中特定字符
foreach ($files as $file) {
    $content = file_get_contents($dirRoot.'\\'.$file);
    preg_match('|(?=\$this->addForm).*(?<=\$this->addNext)|sU', $content, $match);
    file_put_contents('tmp.txt', $file."\n".$match[0]."\n", FILE_APPEND);
}