<?php
$arr = [50,10,90,30,70,40,80,60,20];

function heapAdjust($arr, $s, $m)
{
    $tmp = $arr[$s];
    for ($j = 2 * $s; $j <= $m; $j*=2) { 
        if ($j < $m && $arr[$j] < $arr[$j + 1]) {
            ++ $j;
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
function heapSort($arr)
{
    // 构建最大堆
    for ($i = floor(count($arr) / 2); $i > 0; $i--) { 
        heapAdjust($arr, $i, count($arr) - 1);
    }

    // 堆顶记录和最后一个记录交换
    for ($j = count($arr) - 1; $j > 0; $j--) { 
        $tmp = $arr[0];
        $arr[0] = $arr[$j];
        $arr[$j] = $tmp;
        heapAdjust($arr, 0, $j - 1);
    }
    return $arr;
}

print_r(heapSort($arr));