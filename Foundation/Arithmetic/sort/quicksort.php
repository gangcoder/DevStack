<?php
$arr = [50,10,90,30,70,40,80,60,20];

function quicksort($arr)
{
    $length = count($arr) - 1;
    qsort($arr, 0, $length);
}

function qsort($arr, $low, $high)
{
    if ($low < $high) {
        $pivot = partition($arr, $low, $high);
    }
    qsort($arr, $low, $pivot -1);
    qsort($arr, $pivot + 1, $high);
}

function partition(& $arr, $low, $high)
{
    $pivotkey = $arr[$low];
    while ($low < $high) {
        while ($low < $high && $arr[$high] >= $pivotkey)
            $high --;
        $tmp = $arr[$low];
        $arr[$low] = $arr[$high];
        $arr[$high] = $tmp;

        while ($low < $high && $arr[$low] <= $pivotkey) 
            $low ++;
        $tmp = $arr[$low];
        $arr[$low] = $arr[$high];
        $arr[$high] = $tmp;

    }
    return $low;
}