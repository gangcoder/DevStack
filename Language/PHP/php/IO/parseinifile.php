<?php
define('BIRD', 'Dodo bird');

$iniArray = parse_ini_file('sample.ini');
print_r($iniArray);

$iniArray = parse_ini_file('sample.ini', true);
print_r($iniArray);