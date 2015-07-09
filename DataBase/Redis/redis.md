# Redis

## install

ubuntu 'sudo apt-get install redis-server'

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

`redis-cli EVAL "$(cat luascript_path)”"0`


## PHP 操作redis

[php_redis](./Redis.php)
