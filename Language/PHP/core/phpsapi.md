# SAPI

SAPI: Server abstraction API

PHP与其他应用的编程接口

![phpsapi](phpsapi.jpg)

## SAPI种类

- apache的mod_php5，CGI
- IIS的ISAPI
- Shell的CLI

脚本以SAPI接口实现开始执行。不同的SAPI接口实现会完成他们特定的工作，
例如Apache的mod_php SAPI实现需要初始化从Apache获取的一些信息，在输出内容是将内容返回给Apache

## SAPI 实现

`/main/SAPI.c`和`SAPI.h`文件所包含的一些函数就是模板方法模式中的抽象模板 

`/SAPI` 目录下提供各个服务器对于特定接口的定义及相关实现

### Apache SAPI

PHP以mod_php5模块的形式与Apache集成。

### 嵌入式

一般情况下，它的一个请求的生命周期也会和其它的SAPI一样：模块初始化=>请求初始化=>处理请求=>关闭请求=>关闭模块

### FastCGI

CGI(Common Gateway Interface):公共网关接口, HTTP服务器与你的或其它机器上的程序进行“交谈”的一种工具，其程序一般运行在网络服务器上.

FastCGI像是一个常驻(long-live)型的CGI，它可以一直执行着，只要激活后，不会每次都要花费时间去fork一次(这是CGI最为人诟病的fork-and-execute 模式)。

**工作流程**

1. Web Server启动时载入FastCGI进程管理器（IIS ISAPI或Apache Module)
1. FastCGI进程管理器自身初始化，启动多个CGI解释器进程(可见多个php-cgi)并等待来自Web Server的连接。
1. 当客户端请求到达Web Server时，FastCGI进程管理器选择并连接到一个CGI解释器。Web server将CGI环境变量和标准输入发送到FastCGI子进程php-cgi。
1. FastCGI子进程完成处理后将标准输出和错误信息从同一连接返回Web Server。当FastCGI子进程关闭连接时，请求便告处理完成。FastCGI子进程接着等待并处理来自FastCGI进程管理器(运行在Web Server中)的下一个连接。 在CGI模式中，php-cgi在此便退出了。


### PHP-FPM

PHPFastCGI管理器，是只用于PHP的。

[TIPI SAPI](http://www.php-internals.com/book/?p=chapt02/02-01-php-life-cycle-and-zend-engine)