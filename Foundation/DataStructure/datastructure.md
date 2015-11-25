# 数据结构和算法分析

- [x] 线性表
    - [x] 线性表定义
    - [x] 线性表顺序存储实现
    - [x] 线性表链式存储
        - [x] 单链表
        - [x] 静态链表
        - [x] 循环链表
        - [x] 双向链表
- [x] 栈
    - [x] 栈定义
    - [x] 顺序存储实现
    - [x] 两栈共享
    - [x] 链栈
    - [ ] 应用
- [x] 队列
    - [x] 队列定义
    - [x] 循环队列
    - [x] 链式存储实现
- [ ] 串
- [ ] 树
- [ ] 图

## 数据结构主要研究组织大量数据的方法，而算法分析则是对算法运行时间的的评估

## 学习目的

1. 基本数据结构ADT
2. 合理组织，表达，处理数据
3. 提高程序质量


常见数据结构: 数组,字符串,链表,二叉树,队列,栈,线性表,堆,跳表,散列,竞赛树,搜索数

## 1.1 链表(linked list)

链表由一系列不必在内存中相连的结构组成。每一个结构均含有表元素和指向包含该元素的后继元的结构指针。

###  代码逻辑

```
// 链表搜索
LIST-SEARCH(L, k)
    x = L.head
    while x != NIL and x.key != k
        x = x.next
    return x

// 链表插入
LIST-INSERT(L, k)
    x.next = L.head
    if L.head != NIL
        L.head.prev = x
    L.head = x
    x.prev = NIL

// 链表删除
LIST-DELETE(L, x)
    if x.prev != NIL
        x.prev.next = x.next
    else L.head = x.next
    if x.next != NIL
        x.next.prev = x.prev
```

##1.2 栈

stack

栈是限制插入和删除只能在一个位置上进行的表，该位置是表的末端，叫做栈的顶(top)。

对栈的基本操作有**Push**（进栈）和**Pop**（出栈），前者相当于插入，后者则是删除最后插入的元素。

所以，栈也叫LIFO（后进先出）表

### 出栈入栈

```
// 检查空栈
STACK-EMPTY(S)
    if S.top == 0
        return TRUE
    else return FALSE

// 入栈
PUSH(S, x)
    S.top = S.top + 1
    S[S.top] = x

//  出栈
POP(S)
    if STACK-EMPTY(S)
        error("underflow")
    else S.top = S.top - 1
        return S[S.top + 1]
```

### 两栈共享

两个相同类型的栈，我们为它们各自开辟了数组空间，极有可能是第一个栈已经满了，再进栈就溢出了，而另一个栈还有很多存储空间空闲

两栈共享：两个栈在数组的两端，向中间靠拢。top1和top2是栈1和栈2的栈顶指针，可以想象，只要它们俩不见面，两个栈就可以一直使用

栈满：两个栈见面之时，也就是两个指针之间相差1时，即top1+1==top2为栈满


## 1.3 队列(queue)

像栈一样，队列也是表。然而，使用队列时插入在一端进行而删除在另一端进行。

队列的基本操作是入队(Enqueue),它是在表的末端(叫做队尾(rear))插入一个元素，还有出队(Dequeue),它是删除或返回在表的开头(叫做对头(front))的元素。

###  代码逻辑

```
// 入队
ENQUEUE(Q, x)
    Q[Q.tail] = x
    if Q.tail == Q.length
        Q.tail = 1
    else Q.tail = Q.tail + 1

// 出队
DEQUEUE(Q)
    x = Q[Q.head]
    if Q.head == Q.length
        Q.head = 1
    else Q.head = Q.head + 1
    return x
```

**ADT**

数据结构：逻辑结构，存储结构，运算