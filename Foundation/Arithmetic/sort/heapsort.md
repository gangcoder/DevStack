# 堆

## 节点下标

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

## 维护堆性质

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

## 建堆

```
BUILD-MAX-HEAP (A)
    A.heap-size = A.length
    for i = floor(A.length/2) downto 1
        MAX-HEAPIFY(A, i)
```

## 堆排序算法

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