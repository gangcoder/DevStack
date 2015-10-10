# Python 语法

## 语法

### 数据类型

- 整数
- 浮点
- 字符串
- 布尔
- 空值 None
- 变量

#### list

集合
```
>>> classmates = ['Michael', 'Bob', 'Tracy']
>>> len(classmates)
3
```

#### tuple

tuple和list非常类似，但是tuple一旦初始化就不能修改

```
>>> classmates = ('Michael', 'Bob', 'Tracy')
```

#### dict

全程dictionary, 使用键-值（key-value）存储
```
>>> d = {'Michael': 95, 'Bob': 75, 'Tracy': 85}
>>> d['Michael']
95
```

#### set

set和dict类似，也是一组key的集合，但不存储value。由于key不能重复，所以，在set中，没有重复的key

```
>>> s = set([1, 2, 3])
>>> s
{1, 2, 3}
```

### 结构

#### 判断

```
age = 20
if age > 18 :
    print('You age is:', age)
```
```
age = 3
if age >= 18:
    print('your age is', age)
    print('adult')
else:
    print('your age is', age)
    print('teenager')
```
```
age = 3
if age >= 18:
    print('adult')
elif age >= 6:
    print('teenager')
else:
    print('kid')
```

#### 循环

for ... in
```
names = ['Michael', 'Bob', 'Tracy']
for name in names:
    print(name)
```

while
```
n = 99
while n > 0:
    print(n)
    n = n - 2
```

### 函数

函数名、括号、括号中的参数和冒号: 缩进块中编写函数体 函数的返回值用return语句返回

```
def my_abs(x):
    if x >= 0:
        return x
    else:
        return -x
```

空函数
```
def nop():
    pass
```

#### 多重返回值

```
import math

def move(x, y, step, angle=0):
    nx = x + step * math.cos(angle)
    ny = y - step * math.sin(angle)
    return nx, ny

>>> r = move(100, 100, 60, math.pi / 6)
>>> print(r)
(151.96152422706632, 70.0)
```

返回值是一个tuple

#### 可变参数

```
def calc(*numbers):
    sum = 0
    for n in numbers:
        sum = sum + n * n
    return sum

>>> nums = [1, 2, 3]
>>> calc(*nums)
14
```

#### 关键字参数