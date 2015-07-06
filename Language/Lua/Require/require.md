# require

require 函数原型
```
function require(name)
    if not package.loaded[name] then
        local loader = findloader(name)
        if loader == nil then
            error("unable to load module"..name)
        end
        package.loaded[name] = true
        local res = loader(name)
        if res ~= nil then
            package.loaded[name] = res
        end
    end
    return package.loaded[name]
end
```

## 示例

```
//目录结构
|-- require.lua
|-- helpers
   |-- func.lua
   `-- init.lua
```

### 模块示例
```
--模块名以参数传入
local M = {}
--print(...)
--_G[...] = M --将M注册到全局变量
package.loaded[...] = M --将模块直接复制给package.loaded

--函数环境
local _G = _G
_ENV = M

function new(r, i)
    return {r=r, i=i}
end

i = new(0, 1)

function add(c1, c2)
    return new(c1.r+c2.r, c1.i+c2.i)
end

function sub(c1, c2)
    return new(c1.r-c2.r, c1.i-c2.i)
end

function mul(c1, c2)
    return new(
        c1.r*c2.r-c1.i*c2.i,
        c1.r*c2.i+c1.i*c2.r
    )
end

function inv(c)
    local n = c.r^2 + c.i^2
    return new(c.r/n, -c.i/n)
end

function div(c1, c2)
    return mul(c1, inv(c2))
end

function M.tostring (c)
    return "(" .. c.r .. "," .. c.i .. ")"
end

--return M
```

### 引入模块

```
function printtable(name)
    for k, v in pairs(name) do
        print(k ,v);
    end
end

local cpx = require 'helpers' --标准调用方式

c1 = cpx.new(3, 4)
c2 = cpx.new(1, 2)

--printtable(cpx.mul(c1, c2))
--print(cpx.tostring(cpx.add(cpx.new(3,4), cpx.i)))
--printtable(package.loaded)
local func = require 'helpers.func'
func.test()
printtable(package.loaded)
```
