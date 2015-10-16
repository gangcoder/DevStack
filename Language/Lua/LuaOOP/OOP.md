# Lua面向对象

table作为一种对象

* table与对象一样拥有状态
* 拥有独立其值的标识 self
* 独立的生命周期

## 类

### :

```
Account = {balance = 0}
function Account.withdraw(self, v)
    self.balance = self.balance - v
end

function Account:deposit(v)
    self.balance = self.balance + v
end

a = Account
Account = nil
a:withdraw(100)
print(a.balance) -- -100
```

`:` 冒号在方法定义中添加一个额外的隐藏参数

### 对象

类是创建对象的模具，定义了特定对象的行为

原型：每个对象都有一个prototype（原型），当调用不属于对象的某些操作时，会最先会到prototype中查找这些操作

Lua面向对象：创建一个对象，作为其它对象的原型即可（原型对象为类，其它对象为类的instance）

```
function Account:new(o)
    o = o or {}
    setmetatable(o, self)
    self.__index = self
    return o
end

a = Account:new{balance = 0}
a:deposit(100.0)
```

1. 创建新的账号a时，a将Account作为他的 metatable
1. 当我们调用a:deposit(100.00)，我们实际上调用的是a.deposit(a,100.00)
1. Lua在表a中找不到deposit，因此他回到metatable的__index对应的表中查找，情况大致如下：
1. getmetatable(a).__index.deposit(a, 100.00)

`getmetatable(a).__index.deposit == Accountdeposit` 新的账号对象从Account继承了deposit方法

## 继承

```
Account = {balance = 0}

function Account:new (o)
    o = o or {}
    setmetatable(o, self)
    self.__index = self
    return o
end
 
function Account:deposit (v)
    self.balance = self.balance + v
end
 
function Account:withdraw (v)
    if v > self.balance then error"insufficient funds" end
    self.balance = self.balance - v
end

SpecialAccount = Account:new()
-- 重定义父类中继承
function SpecialAccount:withdraw (v)
    if v - self.balance >= self:getLimit() then
       error"insufficient funds"
    end
    self.balance = self.balance - v
end

function SpecialAccount:getLimit ()
    return self.limit or 0
end

s = SpecialAccount:new{limit=1000.00}
for k,v in pairs(s) do
    print(k,v)
end
```

## 多重继承

当表的metatable存在一个__index函数时，如果调用原始表中不存在的函数，Lua将调用这个__index指定的函数
这样可以__index实现在多个父类中查找子类不存在的域

## 私有性

## 单一方法