# 源码结构

- 根目录  主要包含一些说明文件以及设计方案
- build  源码编译相关文件
- ext  官方扩展目录，包括了绝大多数PHP的函数的定义和实现
- main  PHP核心文件，主要实现PHP的基本设施，这里和Zend引擎不一样，Zend引擎主要实现语言最核心的语言运行环境。
- Zend  Zend引擎的实现目录，比如脚本的词法语法解析，opcode的执行以及扩展机制的实现等等。
- pear  “PHP 扩展与应用仓库”，包含PEAR的核心文件。
- sapi  包含了各种服务器抽象层的代码，例如apache的mod_php，cgi，fastcgi以及fpm等等接口。
- TSRM  PHP的线程安全是构建在TSRM库之上的，PHP实现中常见的\*G宏通常是对TSRM的封装，TSRM(Thread Safe Resource Manager)线程安全资源管理器。
- tests  PHP的测试脚本集合，包含PHP各项功能的测试文件
- win32  Windows平台相关的一些实现，比如sokcet的实现在Windows下和\*Nix平台就不太一样，同时也包括了Windows下编译PHP相关的脚本。 