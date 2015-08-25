# 垃圾回收机制

## 引用计数

### 变量容器

PHP变量存在于 `zval` 变量容器中

```
zval{
    变量类型
    变量值
    is_ref // bool值，用来标识这个变量是否是属于引用集合(reference set)。php引擎通过这个字节把普通变量和引用变量区分开来
    refcount // 表示指向这个zval变量容器的变量(也称符号 symbol)个数
}
```

```
<?php
$a = 'new string';
xdebug_debug_zval('a'); // 需要xdebug扩展
// a: (refcount=1, is_ref=0)='new string'
```

把一个变量赋值给另一变量将增加引用次数(refcount). 

```
<?php
$a = 'new string';
$b = $a;
xdebug_debug_zval('a');
// a: (refcount=2, is_ref=0)='new string'
```

变量容器在”refcount“变成0时就被销毁. 当任何关联到某个变量容器的变量离开它的作用域(比如：函数执行结束)，或者对变量调用了函数 unset() 时，”refcount“就会减1

```
<?php
$a = 'new string';
$b = $c = $a;
xdebug_debug_zval('a');
// a: (refcount=3, is_ref=0)='new string'
unset($b, $c);
xdebug_debug_zval('a');
// a: (refcount=1, is_ref=0)='new string'
```

### 复合类型(Compound Types)

array 和 object 复合类型的变量把它们的成员或属性存在自己的符号表中

```
$a  = array('meaning'=>'life', 'number'=>42);
xdebug_debug_zval (  'a'  );
a: (refcount=1, is_ref=0)=array ('meaning' => (refcount=1, is_ref=0)='life', 'number' => (refcount=1, is_ref=0)=42)
```

### 清理变量容器的问题

```
$a = array('one');
$a[] =& $a;
// unset($a);
xdebug_debug_zval('a');
// a: (refcount=2, is_ref=1)=array (0 => (refcount=1, is_ref=0)='one', 1 => (refcount=2, is_ref=1)=...)
```

对变量 $a 调用unset, 那么变量 $a  和数组元素 "1" 所指向的变量容器的引用次数减1, 从"2"变成"1". 

`(refcount=2, is_ref=1)=array (0 => (refcount=1, is_ref=0)='one', 1 => (refcount=1, is_ref=1)=...)`

不再有作用域中的任何符号指向这个结构，但由于数据元素`1` 仍指向数组本身，所以容器不会被清楚。

因为没有另外的符号指向它，用户没有办法清除这个结构，结果就会导致内存泄漏

php将在脚本执行结束时清除这个数据结构，在长时间运行的脚本中，如请求基本上不会结束的守护进程(deamons)，会消耗大量内存。

## 回收周期

