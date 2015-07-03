# Metatable && Metamethod

描述变量类型的行为

### 算术元表
```
t = {}
print(getmetatable(t)) --获取类型的元表

t1 = {}
setmetatable(t, t1) --只有table可以设置元表
print(getmetatable(t))

print(getmetatable('hi'))--字符串类型有元表
print(getmetatable(10))  --其它类型默认没有元表
```

[示例](./metatable.lua)
```
Set = {}
local mt = {}

function Set.new (l)
    local set = {}
    setmetatable(set, mt)
    for _, v in ipairs(l) do
        set[v] = true
    end
    return set
end

function Set.union(a, b)
    local res = Set.new{}
    for k in pairs(a) do res[k] = true end
    for k in pairs(b) do res[k] = true end
    return res
end

function Set.intersection(a, b)
    local res = Set.new{}
    for k in pairs(a) do
        res[k] = b[k]
    end
    return res
end

function Set.tostring(set)
    local l = {} 
    for e in pairs(set) do
        l[#l + 1] = e
    end
    return '{'..table.concat(l, ',')..'}'
end

function Set.print(s)
    print(Set.tostring(s))
end

mt.__add = Set.union
mt.__mul = Set.intersection

s1 = Set.new{10, 20, 30, 40, 50}
s2 = Set.new{30, 1}
print(getmetatable(s1))
print(getmetatable(s2))

s3 = s1 + s2
Set.print(s3)
--{40,1,10,20,30,50}

s4 = s3*s1
Set.print(s4)
--{40,10,20,30,50}

for k, v in pairs(s4) do
    print(k, v)
end
```

### 操作符对应字段

算术类

- \__add 加法
- \__mul 乘法
- \__sub 减法
- \__div 除法
- \__unm 相反数
- \__mod 取模
- \__pow 乘幂
- \__concat 连接操作符

关系类

- \__eq 等于
- \__lt 小于
- \__le 小于等于

库定义

- \__tostring print打印集合时，会调用集合的该元方法
- \__metatable 设置次字段时，getmetatable返回该字段值，setmetatable返回错误

table 访问

- \__index 访问table不存在的字段
\__index 可以以函数形式存在，也可以以table形式存在，rawget()可以绕过
- \__newindex 设置table不存在的键时调用，rawset()绕过

### 设置默认值

```
local key = {}
local mt = {__index = function(t) return t[key] end}
function setDefault(t, d)
    t[key] = d
    --for k, v in pairs(t) do
        --print(k, v)
    --end
    setmetatable(t, mt)
end

tab = {x=10}
print(tab.x, tab.z)
setDefault(tab, 0)
print(tab.x, tab.z)
```

### 跟踪table

```
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
```

### 只读table

```
function readonly(t)
    local proxy = {}
    local mt = {
        __index = t,
        __newindex = function(t, k, v)
            error('attempt to update a read-only table', 2)
        end
    }
    setmetatable(proxy, mt)
    return proxy
end

days = readonly{'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'}
print(days[1])
days[2] = 'Noday'
```
