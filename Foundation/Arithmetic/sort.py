def insert_sort(lists):
    # 插入排序
    count = len(lists)
    for i in range(1, count):
        print(lists)
        key = lists[i]
        j = i - 1
        while j >= 0:
            if lists[j] > key:
               lists[j + 1] = lists[j]
               lists[j] = key
            j -= 1
    return lists

lists = [3, 2, 4, 6, 1, 9]
# print(insert_sort(lists))

def shell_sort(lists):
    # 希尔排序
    count = len(lists)
    step = 2
    group = count / step
    while group > 0:
        group = int(group)
        for i in range(0, group):
            j = i + group
            while j < count:
                k = j - group
                key = lists[j]
                while k >= 0:
                    if lists[k] > key:
                        lists[k + group] = lists[k]
                        lists[k] = key
                    k -= group
                j += group
        group = group /step
    return lists
# print(shell_sort(lists))

def bubble_sort(lists):
    # 冒泡排序
    count = len(lists)
    for i in range(0, count):
        print(lists)
        for j in range(i + 1, count):
            if lists[i] > lists[j]:
                lists[i], lists[j] = lists[j], lists[i]
    return lists
# print(bubble_sort(lists))

def quick_sort(lists, left, right):
    # 快速排序
    if left >= right:
        return lists
    key = lists[left]
    low = left
    high = right
    while left < right:
        while left < right and lists[right] >= key:
            right -= 1
        lists[left] = lists[right]
        while left < right and lists[left] <= key:
            left += 1
        lists[right] = lists[left]
    lists[right] = key
    quick_sort(lists, low, left -1 )
    quick_sort(lists, left + 1, high )
    return lists

# print(quick_sort(lists, 3, 3))

def quick_sortr(lists):
    count = len(lists)
    if count <= 1:
        return lists
    pivotIndex = int(count / 2) -1
    print(pivotIndex)
    pivot = lists[pivotIndex]
    del lists[pivotIndex]
    left = []
    right = []
    for i in range(0,count):
        if lists[i] <pivot:
            left.append(lists[i])
        else:
            right.append(lists[i])
    
            

quick = [85, 24, 63, 45, 17, 31, 96, 50]
quick_sortr(quick)