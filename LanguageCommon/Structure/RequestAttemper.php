<?php
var_dump($_SERVER["REQUEST_URI"]);
$paramArr = explode( '/', trim(strtok(urldecode($_SERVER["REQUEST_URI"]),'?'),'/'));
$paramArr = array_merge($paramArr,$_GET);

var_dump($paramArr);

var_dump(pathinfo(__FILE__));
