# Redis

## 特性

### 存储结构

Redis(Remote Dictionary Server)

以字典结构存储数据

- 字符串类型
- 散列类型
- 列表类型
- 集合类型
- 有序集合

### 内存存储与持久化

内存存储： 性能优势

### 功能丰富

- 设置键值生存时间，可用于缓存系统
- 列表类型，可用于实现队列
- 发布/订阅模式，可用于聊天室系统

### 简单稳定

命令简单

## 安装

软件包安装

`ubuntu 'sudo apt-get install redis-server'`

编译安装

Redis没有其他外部依赖，安装过程很简单

`cd redis-stable`

- `make` 编译后在Redis源代码目录的src文件夹中可以找到若干个可执行程序，
- `make test` 命令测试Redis是否编译正确
- `make install` 命令将可执行程序复制到/usr/local/bin

### 可执行程序

- redis-server 服务器
- redis-cli 客户端
- redis-benchmark 性能测试
- redis-check-aof AOF 文件修复工具
- redis-check-dump RDB 文件修复工具

### 启动

1. 直接启动

`redis-server --port 6379`

2. 初始化脚本启动

`utils/redis_init_script`

- 配置初始化脚本 将初始化脚本移至 /etc/init.d 目录, 改名为redis_端口号
- 建立文件夹
    * /etc/redis 存放配置文件
    * /var/redis/端口号 存放持久化文件
- 修改配置文件
- /etc/init.d/redis_端口号 start启动
- `sudo update-rc.d redis_端口号defaults` 加入系统自启动

### 停止

`redis-cli shutdown`

### 发送命令

`redis-cli -h 127.0.0.1 -p 6379`

-h, -p 有默认值

### 命令返回值

1. 状态回复 发送命令后,redis 回复一个状态值
2. 错误回复 命令错误时，返回以`error`开头后跟错误信息
3. 整数回复 自增`incr`, `dbsize`等返回整数
4. 字符串回复 请求一个键值元素时，返回字符串
5. 多行字符串回复 `keys *`返回多行字符串，字符串以序号开头

### 配置

#### 启动配置

将配置文件的路径作为启动参数

`redis-server /path/to/redis.conf`

启动参数传递同名 的配置

`redis-server/path/to/redis.conf --loglevel warning`

CONFIG SET 命令在不重新启动Redis的情况下动态修改部分Redis配置

`redis>CONFIG SET loglevel warning`

CONFIG GET命令获得Redis当前的配置情况

```
redis>CONFIG GET loglevel
1) "loglevel" // 选项名 
2) "warning"  // 选项值
```

### 多数据库

redis实例提供多个用来存储数据的字典，每个字典可理解成一个独立的数据库

`databases 16` 每个数据库对外以一个从0开始的递增数字命名，Redis默认支持16个数据库
 
`redis>SELECT 1` SELECT命令更换数据库

#### 注意

- Redis不支持自定义数据库的名字，每个数据库都以编号命名， 开发者必须自己记录哪些数据库存储了哪些数据
- Redis也不支持为每个数据库设置不同的访问密码，一个客户端要么可以访问全部数据库，要么一个数据库也没有权限访问
- 多个数据库之间并不是完全隔离的，如FLUSHALL命令可以清空一个Redis实例中所有数据库中的数据

因此可以用一个redis实例存储一个应用不同环境(正式，测试)的数据，不同应用使用不同实例

## redis lua

```
--print hello
local msg = 'hello redis by lua'
return msg

--insert key from agrs
local link_id = redis.call("INCR", KEYS[1])
redis.call("HSET",KEYS[2],link_id,ARGV[1])
```

执行Redis Lua脚本

`redis-cli EVAL "$(cat luascript_path)"0`


## PHP 操作redis

[php_redis](./Redis.php)
