# 引用

## 解释

不同的名字可以访问同一个变量内容

## 引用作用

### 指向内容

PHP 的引用允许用两个变量来指向同一个内容

```
<?php
$a  =&  $b ;
?>
```

这意味着 $a 和 $b 指向了同一个变量。

### 传递变量

通过在函数内建立一个本地变量并且该变量在呼叫范围内引用了同一个内容来实现。

```
<?php
function foo(& $var )
{
    $var ++;
}

$a = 5 ;
foo( $a ); //注意在函数调用时没有引用符号——只有函数定义中有
echo $a; //6
?>
```

### 引用返回

```
<?php
class foo {
    public $value = 42 ;

    public function & getValue () {
        return  $this -> value ;
    }
}

$obj = new  foo ;
$myValue = & $obj -> getValue ();  // $myValue is a reference to $obj->value, which is 42.
$obj->value = 2 ;
echo $myValue ;                 // prints the new value of $obj->value, i.e. 2.
?>
```

和参数传递不同，这里必须在两个地方都用 & 符号——指出返回的是一个引用，而不是通常的一个拷贝，同样也指出 $myValue  是作为引用的绑定，而不是通常的赋值

Note: 如果试图这样从函数返回引用：return ($this->value);，这将不会起作用，因为在试图返回一个表达式的结果而不是一个引用的变量

## 取消引用

当 unset 一个引用，只是断开了变量名和变量内容之间的绑定。变量内容没有被销毁

```
<?php
$a = 1;
$b =& $a;
unset( $a );
?>
```
不会 unset $b ，只是 $a

## 使用引用的结构


*global 引用*

当用 global $var 声明一个变量时实际上建立了一个到全局变量的引用。也就是说和这样做是相同的：

```
<?php
$var =& $GLOBALS["var"];
?>
```

这意味着，例如，unset $var 不会 unset 全局变量。

*$this*

在一个对象的方法中， $this 永远是调用它的对象的引用。
