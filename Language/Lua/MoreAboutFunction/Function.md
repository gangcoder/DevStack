# More About Function

Functions in Lua are First-Class Value, Lexical Scoping

## First-Class Value

Functions can be stored in variables and table, or as arguments and return of other functions.

函数名持有函数：

```
p = print
p('hello function')
```

函数构造：

```
function foo(x) return 2*x end
foo = function(x) return 2*x end
```

## Lexical Scoping

一个函数可以嵌套在另一个函数中，内部函数可以访问外部函数中的变量

### 非局部变量 non-local variable

匿名函数使用的外部函数局部变量。这个变量在匿名函数内部既不是全部变量，也不是局部变量。

### Closure

closure 一个函数 + 该函数所需访问的所有非局部变量

```
-- Lexical
function newCounter()
    local i = 0
    return function()
        i = i + 1 -- i is non-local variable
        return i
     end
 end

 count1 = newCounter(); -- count is closure
 print(count())
 print(count())

 count2 = newCounter(); -- count is closure
 print(count())
 print(count())
 ```

 Closure 可以将原生处理函数保存到一个私有变量中，而是用新的受限版本调用原来的函数

```
do
    local oldSin = math.sin
    math.sin = function(x)
        return oldSin(x)
    end
end
```

## 非局部的函数 non global function

函数可以存储在table 中

```
Lib = {}
Lib.foo = function(x,y) return x+y end
Lib.goo = function(x,y) return x-y end

function Lib.fo1(x,y) return x+y end
function Lib.go1(x,y) return x-y end

print(Lib.foo(1,2))
print(Lib.go1(1,2))
```

函数存储在局部变量中

```

local fact = function(n)
    if n == 0 then
        return 1
    else
        return n*fact(n-1) -- 错误，局部变量fact尚未定义完成，实际调用的fact为全局fact
    end
end

local fact
fact = function(n)
    if n == 0 then
        return 1
    else
        return n*fact(n-1) -- 虽然局部变量fact尚未定义完成，但是在函数执行后fact 会有正确值
    end
end
```

Lua 展开局部函数定义:

`local function foo (<参数>) <body> end` 语法糖展开
```
local foo
foo = function (<参数>) <body> end
```
