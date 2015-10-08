# PHP ob 缓存

## OB 使用示例

每隔一秒输出数字

```
<?php
ob_start(); //开启缓存
foreach (range(1, 10) as $key => $value) {
    echo str_repeat(' ', 10240), $value, "<br/>";
    ob_flush(); //刷出缓存区
    sleep(1);
}
ob_end_flush(); //关闭缓存
```

浏览器只有当接受到的内容超过一定字节以后，才开始显示该页面，所以必须发送一些额外的空格来让这些浏览器显示页面内容

Apache服务器下运行正常，Nginx下没效果。原因未知

## OB 缓存原理

1. ob缓存打开,echo的数据首先放入ob缓存
1. 如果是header/setcookie信息，直接放在程序缓存
1. 当页面执行到最后，会把ob缓存的数据放到程序缓存，然后一次返回给浏览器

## 系列函数

- ob_start(callback, chunk_size) 打开输出控制缓冲
- ob_get_contents() 返回输出缓冲区的内容
- ob_get_length() 返回输出缓冲区的长度
- ob_flush() 冲刷出(送出)输出缓冲区中的内容
- flush() 配合 ob_flush()使用
- ob_end_flush() 刷出缓存区内容并关闭
- ob_end_clean() 清空缓存区内容并关闭

[ob_flush & flush](http://www.laruence.com/2010/04/15/1414.html)