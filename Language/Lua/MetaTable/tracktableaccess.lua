local index = {} --以index的table地址作为键
local mt = {
    __index = function(t, k)
        print('*access to element '..tostring(k))
        return t[index][k]
    end,
    __newindex = function(t, k, v)
        print('*update of element '..tostring(k)..' to '..tostring(v))
        t[index][k] = v
    end
}

function track(t)
    local proxy = {}
    proxy[index] = t --在特殊地址中保存原table
    setmetatable(proxy, mt)
    return proxy
end

t = {}
t = track(t)
t[1] = 'hello'
a = t[1]
print(a)
