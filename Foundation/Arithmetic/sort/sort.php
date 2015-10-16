<?php

$count = 10000;

for($i=0;$i<$count;$i++){
    $random_array[$i] = rand(0,$count);
}


# 空白对照
$start = microtime(1);
echo 'Do nothing takes:' . number_format((microtime(1) - $start), 6);
echo "\n";

# 原生方法排序
$test_array = $random_array;
$start = microtime(1);

sort($test_array);
echo 'Origin sort takes:' . number_format((microtime(1) - $start), 6);
echo "\n";

# 冒泡排序
# 两两交换，思路很简单
$test_array = $random_array;
$start = microtime(1);
# 需要把计算个数的时间也考虑到
$count = count($test_array);
# 循环n-1次
for($i=1;$i<$count;$i++){
    # 循环n-1-$i次
    for($j=0;$j<$count-$i;$j++){
        if($test_array[$j] > $test_array[$j+1]){
            $tmp = $test_array[$j];
            $test_array[$j] = $test_array[$j+1];
            $test_array[$j+1] = $tmp;
        }
    }
}
echo 'Bubble sort takes:' . number_format((microtime(1) - $start), 6);
echo "\n";

# 选择排序
# 依次选择最小(大)的元素，等选择完毕自动有序
$test_array = $random_array;
$start = microtime(1);
$count = count($test_array);

for($i=0;$i<$count-1;$i++){
    # $test_array[$i]为当前最小
    for($j=$i+1;$j<$count;$j++){
        # 从下一个开始比较
        if($test_array[$i] > $test_array[$j]){
            $tmp = $test_array[$j];
            $test_array[$j] = $test_array[$i];
            $test_array[$i] = $tmp;
        }
    }
}
echo 'Select sort takes:' . number_format((microtime(1) - $start), 6);
echo "\n";


# 插入排序
# 就像别人给你发扑克牌，拿到一张牌就插到你手上，并使之有序
$test_array = $random_array;
$start = microtime(1);
$count = count($test_array);
# 直接跳过$i=0
for($i=1;$i<$count;$i++){
    # 取$i左边的元素先比，比到最左
    for($j=$i-1;$j>=0;$j--){
        # 共$j+1个元素，其中前$j个有序
        if($test_array[$j] > $test_array[$j+1]){
            $tmp = $test_array[$j];
            $test_array[$j] = $test_array[$j+1];
            $test_array[$j+1] = $tmp;
        }else{
            break;
        }
    }
}

echo 'Insertion sort takes:' . number_format((microtime(1) - $start), 6);
echo "\n";


# 快速排序
# 有点递归的思想，随机一个基准，将集合分为两半，然后继续分解，直到元素个数为1或0个
$test_array = $random_array;
$start = microtime(1);

function quick_sort($arr){
    $len = count($arr);
    # 符合条件<=1即无需分组
    if($len <= 1) return $arr;

    # floor也行，主要是取整
    $index = ceil($len/2);
    $base = $arr[$index];

    $left = array();
    $right = array();

    for($i=0;$i<$len;$i++){
        if($i == $index) continue;
        if($arr[$i] < $base){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }

    $l = quick_sort($left);
    $r = quick_sort($right);
    return array_merge($l, (array)$base, $r);
}

quick_sort($test_array);
echo 'Quick sort takes:' . number_format((microtime(1) - $start), 6);
echo "\n";