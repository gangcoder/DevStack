# PHP命名空间

一种封装事物的方法，原理类似于操作系统中使用目录来对文件分组

## 解决问题

1. 用户编写的代码与PHP内部的类/函数/常量或第三方类/函数/常量之间的名字冲突。  
1. 为很长的标识符名称(通常是为了缓解第一类问题而定义的)创建一个别名（或简短）的名称，提高源代码的可读性。 

## 定义

```
<?php
namespace  MyProject ;  // 所有非 PHP 代码包括空白符都不能出现在命名空间的声明之前(declare 语句除外)

// 只有类，函数，常量的代码受命名空间的影响
const  CONNECT_OK  =  1 ;
class  Connection  {  /* ... */  }
function  connect () {  /* ... */   }

```

### 全局空间

如果没有定义任何命名空间，所有的类与函数的定义都是在全局空间，与 PHP 引入命名空间概念前一样。

在名称前加上前缀 \ 表示该名称是全局空间中的名称，即使该名称位于其它的命名空间中时也是如此。 

### 多层命名空间

```
<?php
 namespace  MyProject \ Sub \ Level ; // 定义的分层次的命名空间，对应相应的目录结构

const  CONNECT_OK  =  1 ;
class  Connection  {  /* ... */  }
function  connect () {  /* ... */   }
```

### 多命名空间

在实际的编程实践中，将多个 PHP 脚本合并在同一个文件中（非常不提倡在同一个文件中定义多个命名空间）

```
<?php
namespace  MyProject  {

const  CONNECT_OK  =  1 ;
class  Connection  {  /* ... */  }
function  connect () {  /* ... */   }
}

// 使用两个大括号分隔
namespace  AnotherProject  { 

const  CONNECT_OK  =  1 ;
class  Connection  {  /* ... */  }
function  connect () {  /* ... */   }
}

// 如果不指定命名空间名称，则为全局代码
namespace {  // 全局代码
session_start ();
$a  =  MyProject \ connect ();
echo  MyProject \ Connection :: start ();
}
 ?> 
```

## use

支持导入类或命名空间。但PHP不支持导入函数或常量。

因为导入的名称必须是完全限定的（不会根据当前的命名空间作相对解析），所以导入的前导反斜杠是不必要的也不允许有反斜杠。

```
<?php
namespace  foo ;
use My\Full\Classname  as  Another ;

// 下面的例子与 use My\Full\NSname as NSname 相同
use My\Full\NSname ;

// 导入一个全局类
use \ArrayObject ;

$obj  = new namespace\ Another ;      // 实例化 foo\Another 对象
$obj  = new  Another ;                // 实例化 My\Full\Classname　对象
NSname \ subns \ func ();             // 调用函数 My\Full\NSname\subns\func
$a  = new  ArrayObject (array( 1 ));  // 实例化 ArrayObject 对象
// 如果不使用 "use \ArrayObject" ，则实例化一个 foo\ArrayObject 对象
```

## 命名空间使用

### 非限定名称

名称中不包含命名空间分隔符的标识符 

```
$a=new foo();
foo::staticmethod();
```
如果当前命名空间是 currentnamespace，foo 将被解析为 currentnamespace\foo。

如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，则 foo 会被解析为foo。   

警告：如果命名空间中的函数或常量未定义，则该非限定的函数名称或常量名称会被解析为全局函数名称或常量名称。

### 限定名称

名称中含有命名空间分隔符的标识符

```
$a = new subnamespace\foo();
subnamespace\foo::staticmethod();
```

如果当前的命名空间是 currentnamespace，则 foo 会被解析为 currentnamespace\subnamespace\foo。

如果使用 foo 的代码是全局的，不包含在任何命名空间中的代码，foo 会被解析为subnamespace\foo。

### 完全限定名称

名称以命名空间分隔符开始的标识符，例如 \Foo\Bar。 namespace\Foo 也是一个完全限定名称。 

```
$a = new \currentnamespace\foo();
\currentnamespace\foo::staticmethod();
```

在这种情况下，foo 总是被解析为代码中的文字名(literal name)currentnamespace\foo。 

### 导入和别名解析

根据当前的导入规则在编译时进行转换。

例如，命名空间 A\B\C 被导入为 C，那么对 C\D\e() 的调用就会被转换为 A\B\C\D\e()

## 解析顺序

类名称总是解析到当前命名空间中的名称。因此在访问系统内部或不包含在命名空间中的类名称时，必须使用完全限定名称

```
<?php
 namespace  A \ B \ C ;
class  Exception  extends \ Exception  {}

 $a  = new  Exception ( 'hi' );  // $a 是类 A\B\C\Exception 的一个对象
 $b  = new \ Exception ( 'hi' );  // $b 是类 Exception 的一个对象

 $c  = new  ArrayObject ;  // 致命错误, 找不到 A\B\C\ArrayObject 类
 ?>
 ``` 

函数和常量:如果当前命名空间中不存在该函数或常量，PHP 会退而使用全局空间中的函数或常量

## 常量

`__NAMESPACE__` 当前命名空间名称的字符串

```
<?php
 namespace  MyProject ;

echo  '"' ,  __NAMESPACE__ ,  '"' ;  // 输出 "MyProject"
 ?> 
```

`namespace` 显式访问当前命名空间或子命名空间中的元素。

```
<?php

 namespace\ func ();  // calls function func()
 namespace\ sub \ func ();  // calls function sub\func()
 namespace\ cname :: method ();  // calls static method "method" of class cname
 $a  = new namespace\ sub \ cname ();  // instantiates object of class sub\cname
 $b  = namespace\ CONSTANT ;  // assigns value of constant CONSTANT to $b
 ?> 
 ```
`::class` 返回类 ClassName 的完全限定名称

```
<?php
 namespace  NS  {
    class  ClassName  {
    }
    
    echo  ClassName ::class; //输出 NS\ClassName
}
 ?> 
 ```
