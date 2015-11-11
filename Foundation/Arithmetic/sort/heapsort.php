<?php

function heapAdjust($arr, $s, $m)
{
    $tmp = $arr[$s];
    for ($i = 2*$s; $i < $m; $i*=2) { 
        if ($i < $m && $arr[$j] < $arr[$j + 1]) {
            ++ $j
        }
        if ($tmp >= $arr[$j]) {
            break;
        }
        $arr[$s] = $arr[$j];
        $s = $j;
    }
    $arr[$s] = $tmp;
    return $arr;
}

// 堆排序
function FunctionName($arr)
{
    for ($i = count($arr); $i > 0; $i--) { 
        heapAdjust($arr, $i, count($arr))
    }
    for ($j = count($arr); $j > 1; $j--) { 
        $tmp = $arr[1];
        $arr[1] = $arr[j];
        $arr[j] = $tmp;
        heapAdjust($arr, 1, i - 1);
    }
    return $arr;
}