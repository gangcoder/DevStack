# OPcache

将PHP脚本预编译的字节码存储到共享内存中来提升PHP的性能,省去了每次加载和解析PHP脚本的开销.

## 需求

`> VERSION 5.5.0`

OPcache 必须在 Xdebug扩展前面加载

## 安装

编译选项 `--enable-opcache`
修改配置 `zend_extension = dllpath`
配置