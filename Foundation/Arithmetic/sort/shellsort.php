<?php
$arr = [10, 2, 5, 8, 4, 3, 7, 6, 9];

// 希尔排序
function shellsort($arr)
{
    $increment = count($arr);
    do {
        $increment = floor($increment / 3 + 1);
        for ($i = $increment; $i < count($arr); $i++) {
            if ($arr[$i] < $arr[$i - $increment]) {
                $key = $arr[$i];
                for ($j = $i - $increment ; $j >= 0 && $key < $arr[$j]; $j -= $increment) { 
                    $arr[$j + $increment] = $arr[$j];
                }
                $arr[$j + $increment] = $key;
            }
        }
    } while ($increment > 1);
    return $arr;
}

print_r(shellsort($arr));