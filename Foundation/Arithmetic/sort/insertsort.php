<?php
$arr = [10, 2, 5, 8, 4, 3, 7, 6, 9];

function insertsort($arr)
{
    for ($i = 1; $i < count($arr); $i++) { 
        if ($arr[$i] < $arr[$i - 1]) {
            $value = $arr[$i];
            for ($j = $i - 1; $j >= 0 && $arr[$j] > $value; $j--) { 
                $arr[$j + 1] = $arr[$j];
            }
            $arr[$j + 1] = $value;
        }
    }
    return $arr;
}

print_r(insertsort($arr));