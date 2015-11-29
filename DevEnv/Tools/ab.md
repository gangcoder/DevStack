# 服务器压力测试

## ab

### 安装

`$sudo apt-get install apache2-utils`

### 测试命令

`ab -c 20 -n 10000 -l url `

-c 并发(模拟的客户端数)
-n 请求总数
-l 忽略文件长度的变化

### 性能指标

1. 吞吐率 request per second
2. 用户平均请求时间 time per request
3. 服务器平均请求等待时间 time per request: across all ...


## webbench

### 测试指令

`webbench -c 500 -t 30 URL`

- c 并发数
- t 时间