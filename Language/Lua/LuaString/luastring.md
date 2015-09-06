# 函数

## String

### string.byte

```
-- string.byte (s [, i [, j]])
local s = 'abc'
print(s:byte(1, #s))
-- 97      98      99
```

### string.char

```
-- string.char
print(string.char(97,98,99))
-- string abc
```

### string.dump

```
-- string.dump
function hello(str)
    print(str)
end
local funstr = string.dump(hello, true)
local world = load(funstr)
world('hello')
-- hello
```

### string.find

```
-- string.find 可捕获
local s = '%a*ohello'
print(s:find('%a*o', 1, true))
-- 1       5       hell
```

### format

```
-- 1. 格式化数字字符串
-- string.format (formatstring, ···)
-- 把整数123打印成一个字符串
print(string.format('%d', 123)) -- 产生“123″
-- 指定宽度，不足的左边补空格
print(string.format('%8d%8d', 123, 123)) -- 产生：“    123    123″
-- 指定宽度，不足的右边补空格
print(string.format('%-8d%8d', 123, 123)) --123          123
-- 16进制
print(string.format('%x', 123)) -- 7b
-- 16进制，指定宽度，不足补0
print(string.format('%08x', 123)) -- 0000007b

-- 2. 控制浮点数打印格式
-- 浮点数使用格式符'%f'控制，默认保留小数点后6位
print(string.format('%f', 3.1415926)) -- 3.141593
-- 控制打印宽度和小数位数 '%m.nf' m 打印的宽度，n 小数点后位数
print(string.format('%-10.3f%d', 3.1415926, 123)) -- 3.142     123

-- 3. 连接字符串
-- n从符串中截取字符
local i = 'abc'
print(string.format('%.2s', i))
-- '*'来占用一个本来需要一个指定宽度或精度的常数数字的位置
-- sprintf(s, “%.*s%.*s”, 7, a1, 7, a2); lua不支持
print(string.format('%#x', 123)) -- '#'产生0X

-- 4. 打印地址信息
-- 地址或者指针是32位的数，可以使用无符号整数的'%u'打印
-- sprintf(s, “%u”, &i);
```

### string.gmatch

```
-- string.gmatch (s, pattern) 迭代匹配
-- [[返回一个迭代器函数. 每次调用这个函数都会继续以 pattern对 s 做匹配，并返回所有捕获到的值]]
s = "hello world from Lua"
for w in string.gmatch(s, "%a+") do
   print(w)
end
-- hello
-- world
-- from
-- Lua
```

### string.gsub

```
-- string.gsub (s, pattern, repl [, n])
local x = string.gsub('hello world', '(%w+)', '%1-%1')
print(x) -- hello-hello world-world

x = string.gsub('hello world', '%w+', '%0 %0', 1);
print(x) -- hello hello world

x = string.gsub('hello world from lua', '(%w+)%s*(%w+)', '%2 %1')
print(x) -- world hello lua from

x = string.gsub("home = $HOME, user = $USER", "%$(%w+)", os.getenv)
print(x) -- home = /home/roberto, user = roberto

x = string.gsub("4+5 = $return 4+5$", "%$(.-)%$", function (s)
  return load(s)()
end)
print(x) -- 4+5 = 9

local t = {name="lua", version="5.3"}
x = string.gsub("$name-$version.tar.gz", "%$(%w+)", t)
print(x) -- lua-5.3.tar.gz
```

### string.match

```
-- string.match (s, pattern [, init])
-- 字符串 s 中找到第一个能用 pattern 匹配到的部分
local s = 'Ds123xa'
print(s:match('%d+', 4)) --23
```

### string.rep

```
-- string.rep (s, n [, sep])
-- s 以 sep 连接，重复n次
print(string.rep('abc', 3, '-')) -- 'abc-abc-abc'
```

### string.reverse

```
-- string.reverse(s)
print(string.reverse('hello world'))
-- dlrow olleh
```

### string.sub

```
-- string.sub (s, i [, j])
```

**%b()**

```
print(string.gsub("a (enclosed (in) parentheses) line", "%b()", ""))
-- a line
```
常用的这种模式有：`%b()` ，`%b[]`，`%b%{%}` 和 `%b<>`。你也可以使用任何字符作为分隔符