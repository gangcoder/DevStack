<?php
$memcache = new Memcache();

$host = '127.0.0.1';
$port = '11211';
$memcache->connect($host, $port);

$memcache->set('class_name', '1', 0, 3600);
$memcache->increment('class_name', '2');
$result = $memcache->get('class_name');
$stats = $memcache->getStats();
var_dump($stats);
$memcache->flush();
$memcache->close();
