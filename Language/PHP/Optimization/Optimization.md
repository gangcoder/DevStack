# PHP 性能的分析

## 宏观层面

PHP 语言本身和环境层面

- PHP 作为解释性语言性能天然的缺陷
- PHP 作为动态类型语言在性能上提升的空间
- 主流 PHP 版本语言引擎性能

### 解释性语言的性能分析

解释性语言在每一次运行都面对原始脚本的输入、解析、编译，然后执行

![parsecompileexecute](parsecompileexecute.png 'parsecompileexecute')

**OpCode 缓存**

代码文件确定时，解析到编译这一步都是确定的。
因为文件已不再变化，仅随输入参数的不同而有不同的执行。

![opcode.png](opcode.png 'opcode')

OpCode缓存扩展: APC、Zend OPCache、eAccelerator

### 动态类型语言的性能

动态类型的语言:涉及到在内存中的类型推断,如字符串加操作得到整数，整数字符串连接操作得到字符串

解决：将PHP转为静态类型的表示(Yaf)

### 语言本身性能

PHP 各个版本的改进


## 应用层面

语法和使用规则的层面



**参考**
[http://news.oneapm.com/php-apm-opcode/](http://news.oneapm.com/php-apm-opcode/)