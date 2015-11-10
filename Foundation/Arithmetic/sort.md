# 排序

排序: 使得序列成为一个按关键字有序的序列`{rp1,rp2,......,rpn}`

## 冒泡排序

### 简单冒泡

```
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
```

### 冒泡

```
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
```

### 优化冒泡

```
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
```

## 简单选择排序

```
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
```

## 直接插入排序

```
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
```

## 希尔排序



## 堆排序

### 节点下标

获取节点下标i 的父节点和左右子节点下标

```
PARENT (i)
    return floor(i/2)

LEFT (i)
    return 2i

RIGHT (i)
    return 2i + 1
```

floor() 舍去法取整函数

### 维护堆性质

```
MAX-HEAPIFY (A, i)
    l = LEFT(i)
    r = RIGHT(i)
    if l <= A.heap-size and A[l] > A[i]
        largest = l
    else largest = i

    if r <= A.heap-size and A[r] > A[i]
        largest = r
    if largest != i
        exchange A[i] with A[largest]
        MAX-HEAPIFY(A, largest)
```

heap-size 表示有多少堆元素存储在数组中

### 建堆

```
BUILD-MAX-HEAP (A)
    A.heap-size = A.length
    for i = floor(A.length/2) downto 1
        MAX-HEAPIFY(A, i)
```

### 堆排序算法

```
HEAPSORT (A)
    BUILD-MAX-HEAP(A)
    for i = A.length downto 2
        exchange A[1] whit A[i]
        A.heap-size = A.heap-size - 1
        MAX-HEAPIFY(A, 1)
```

`A[1]` 是最大节点，将`A[1]`与`A[n]`互换，并将A.heap-size减小
此时堆中少了最大节点，需要维护最大堆属性，循环产生排序后的数组

## 归并排序

## 快速排序