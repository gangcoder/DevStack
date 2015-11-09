<?php
$arr = [10, 2, 5, 8, 4, 3, 7, 6, 9];

function selectsort($arr)
{
    for ($i = 0; $i < count($arr); $i++) { 
        $min = $i;
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$min] > $arr[$j]) {
                $min = $j;
            }
        }
        if ($i != $min) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }
        print_r($arr);
    }
    return $arr;
}

print_r(selectsort($arr));