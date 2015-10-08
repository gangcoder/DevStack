# Lua Data Structures

## Array

整数索引的table

```
a = {}
for i=1, 1000 do
    a[i] = 0
end
```

## Matrices

使用多维数组表示矩阵
```
N = 10
M = 20
mt = {}
for i=1, N do
    mt[i] = {}
    for j=1, M do
        mt[i][j] = 0
    end
end
```

合并索引表示矩阵
```
ma = {}
for i=1, N do
    for j=1, M do
        ma[(i-1)*M+j] = 0
    end
end
```

## Linked List

链表每个节点存储值和其他节点的链接

```
list = {next = list, value = v}
loacl l = list
while l do
    l = l.next
end
```


