<?php
var_dump($_SERVER["REQUEST_URI"]);
$paramArr = explode( '/', trim(strtok(urldecode($_SERVER["REQUEST_URI"]),'?'),'/'));
$paramArr = array_merge($paramArr,$_GET);
var_dump($paramArr);

// array (size=8)
//   0 => string 'git' (length=3)
//   1 => string 'Accumulate' (length=10)
//   2 => string 'LanguageCommon' (length=14)
//   3 => string 'Structure' (length=9)
//   4 => string 'RequestAttemper.php' (length=19)
//   5 => string ' ' (length=1)
//   'abc' => string 'cba' (length=3)
//   6 => string '321' (length=3)
