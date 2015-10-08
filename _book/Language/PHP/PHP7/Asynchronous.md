# 异步并行编程

## 一个PHP Web执行过程

> 请求开始(Get/Post/Cookie/Session)
> 
> 数据查询(MySQL/Redis)
> 
> 模版渲染(HTML/json encode)
> 
> 请求结束(收回内存和资源)

## PHP Server

```
<?php
$serv = stream_socket_server('tcp://0.0.0.0:8000', $errno, $errstr)
    or die('create server failed');

while (1) {
    $conn = stream_socket_accept($serv);
    if (pcntl_fork() == 0) {
        $request = fread($conn);
        //do some thing
        //$response = "hello world";
        fwrite($response);
        fclose($conn);
        exit(0);
    }
}
```

改良

```
<?php
$serv = stream_socket_server('tcp://0.0.0.0:8000', $errno, $errstr)
    or die('create server failed');
for ($i=0; $i < 32; $i++) { 
    if (pcntl_fork() == 0) {
        while (1) {
            $conn = stream_socket_accept($serv);
            if ($conn == false) continue;
            $request = fread($conn);
            //do some thing
            //$response = "hello world";
            fwrite($response);
            fclose($conn);
            exit(0);
        }
    }
}
```

## 异步

Nginx, memcache: libevent & epoll(异步核心)

PHP: libevent扩展, event 扩展