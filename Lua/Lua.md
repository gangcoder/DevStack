## 语法

### 数据类型


#### nil 空类型

```
--nil type 注释  
username = nil --定义username为nil类型  
--if else判断  
if (username == nil) then   
    print("this is nil");  
else  
    print("this is not nil");  
end 
```

#### boolean

```
--boolean  
isTrue = true  
print(isTrue) 
```

#### number

```
--number  
a = 100  
b = 100.5  
print(a + b)
```

#### string

```
--String  
str = "hello lua"  
print(str)         
str2 = " haha"  
print(str..str2)  
```

#### function

```
--function         
function parse(a, b)  
    local c = 0.5;  
    return (a + b) * c  
end                         
print(parse(10,20))         
print(parse(5, 11.2)) 
```


#### table

```
--function                         
function parse(a, b)               
    local c = 0.5;             
    return (a + b) * c         
end                         
print(parse(10,20))         
print(parse(5, 11.2))       
                            
--table                     
userTable = {}              
userTable.username = "initphp"  
userTable.age = 20              
userTable.money = 100           
userTable.info = {}             
userTable.info.height = 172     
userTable.info.func = parse     
print("username:" .. userTable.username .. ";userage:" .. userTable.age)  
print("userInfo:" .. userTable.info.height)                               
print("function :" .. parse(10,20))  
```

#### userdata
userdata 类型用来将任意 C 数据保存在 Lua 变量中

#### thread
用于实现 coroutine （协同例程）

### 结构

#### 函数
```
-- 函数
function fact( n )
    if n == 0 then
        return 1
    else
        return n * fact( n-1 )
    end
end

print('Enter a number:')
a = io.read()
print(fact(a))
```

#### 多重赋值

```
a, b = 10, 20
print("a:"..a.."b:"..b)
```

#### IF

```
val = 2000
if val == 100 then
    print('val==100')
elseif val == 200 then
    print('val==200')
else 
    print('val ='..val)
end
```

#### FOR

```
for i=1, 10, 1
do
    print('test'..i)
end
```

#### while

```
count = 10
while count > 0
do
    print('while: '..count)
    count = count -1
end
```

#### repeat

```
count = 10
repeat
    print('repeat: '..count)
    count = count - 1
until count < 1
```

### 运算

#### AND OR

```
-- and or
a = 10
b = 20
print(a and b)
print(a or b)
```

#### # 取长度

```
--#
str = 'hello'
print('Len: '.. $str)
```

#### local

```
a = 100
c =50
function add(b)
    local c = 100   --局部
    print(a+b+c)
end
add(20)
```

### 换行

Lua 语句不需要分隔符，并且代码中的换行不起任何作用

## 解释器参数

lua -i prog 运行后进入交互模式

dofile('prog.lua') 交互模式中立即执行一个文件

## 基本方法库

断言 `assert(v[,message])`

```
local a = 'hello'
if (assert(a)) then
    print('hello')
end
```

垃圾收集接口

collectgarbage(opt [,arg])

```
local a = 'hello'
if (assert(a)) then
    print('hello')
end
print(collectgarbage('count'))
```

错误处理 `error(message [,level])`

## IO

### 简单IO

```
io.input('./FlightList.html')   --改变stdin
t = io.read("*all") --读取所有文件
io.write(t)     --输出到stdout 
```

### 完整IO

```
local f = io.open(filename, "r")
local t = f:read("*all")
f:close()
```

