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
