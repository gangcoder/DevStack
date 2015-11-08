<?php
$start = microtime(true);

$dlist = new SplDoublyLinkedList();
for ($i=0; $i < 1000; $i++) {
    $dlist->push($i);
}

$linkspend = microtime(true);
echo $linkspend - $start;