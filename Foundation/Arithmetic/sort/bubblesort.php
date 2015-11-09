<?php
$arr = [10, 2, 5, 8, 4, 3, 7, 6, 9];

// 简单冒泡排序
function bubblesort0($arr)
{
    for ($i = 0; $i < count($arr); $i++) { 
        for ($j = $i + 1; $j < count($arr); $j++) { 
            if ($arr[$i] > $arr[$j]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}

// 冒泡排序
function bubblesort($arr)
{
    for ($i =0 ; $i < count($arr); $i++) { 
        for ($j = count($arr) - 2; $j >= $i; $j--) { 
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}

// 冒牌优化
function bubblesort2($arr)
{
    $flag = true;
    for ($i = 0; $i < count($arr) && $flag; $i++) { 
        $flag = false;
        for ($j = count($arr) - 2; $j >= $i; $j--) { 
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $flag = true;
            }
        }
    }
    return $arr;
}
print_r(bubblesort($arr));