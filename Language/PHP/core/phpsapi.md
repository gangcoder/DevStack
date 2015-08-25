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



[TIPI SAPI](http://www.php-internals.com/book/?p=chapt02/02-01-php-life-cycle-and-zend-engine)