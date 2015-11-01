# 数据结构

## 学习目的

1. 基本数据结构ADT
2. 合理组织，表达，处理数据
3. 提高程序质量

## 第一章


数据结构：逻辑结构，存储结构，运算

## 数据结构

数组,字符串,链表,二叉树,队列,栈,线性表,堆,跳表,散列,竞赛树,搜索数

### 数组

### 字符串

## 栈

后进先出

```
STACK-EMPTY(S)
    if S.top == 0
        return TRUE
    else return FALSE
```

```
PUSH(S, x)
    S.top = S.top + 1
    S[S.top] = x
```

```

```
POP(S)
    if STACK-EMPTY(S)
        error("underflow")
    else S.top = S.top - 1
        return S[S.top + 1]
```

## 队列

```
ENQUEUE(Q, x)
    Q[Q.tail] = x
    if Q.tail == Q.length
        Q.tail = 1
    else Q.tail = Q.tail + 1
```

```
DEQUEUE(Q)
    x = Q[Q.head]
    if Q.head == Q.length
        Q.head = 1
    else Q.head = Q.head + 1
    return x
```

## 链表

```
LIST-SEARCH(L, k)
    x = L.head
    while x != NIL and x.key != k
        x = x.next
    return x
```

```
LIST-INSERT(L, k)
    x.next = L.head
    if L.head != NIL
        L.head.prev = x
    L.head = x
    x.prev = NIL
```

```
LIST-DELETE(L, x)
    if x.prev != NIL
        x.prev.next = x.next
    else L.head = x.next
    if x.next != NIL
        x.next.prev = x.prev
```