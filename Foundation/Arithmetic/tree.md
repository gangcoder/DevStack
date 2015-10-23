# Tree

## 树的定义

- 树是元素的集合
- 节点: 存储元素
- 边: 节点之间的联系k
- 父节点
- 子节点
- 兄弟节点: 拥有同一父节点
- 根节点: 没有父加点
- 叶节点: 没有子节点
- 深度: 树中节点的最大层次

## 实现

每个节点存储元素和指向子节点的指针

### 二叉树

binary : 每个节点最多有两个子节点

### 二叉搜索树

binary search tree : 每个节点都不比它左子树的任意元素小，而且不比它的右子树的任意元素大

### 搜索节点

- 如果x等于根节点，那么找到x，停止搜索 (终止条件)
- 如果x小于根节点，那么搜索左子树
- 如果x大于根节点，那么搜索右子树

时间复杂度: log(n) ~ n

### 删除节点

- 叶节点: 直接删除
- 非叶节点: 用左子树中最大的元素(或者右树中最小的元素)，来补充删除元素产生的空缺, 当该元素非叶节点时，递归实现

