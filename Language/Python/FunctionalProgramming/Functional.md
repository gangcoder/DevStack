# 函数式编程

函数式编程没有变量，任意一个函数都具有幂等性。

## 高阶函数

### map

`iterator map(function, iteratable)`

map()函数接收两个参数，一个是函数，一个是Iterable，map将传入的函数依次作用到序列的每个元素，并把结果作为新的Iterator返回

```
def f(x):
    return x*x

r = map(f, [1, 2, 3, 4, 5, 6, 7])
print(r)
>>[1, 4, 9, 16, 25, 36, 49]
```

### reduce

```
def add(x, y):
    return x + y
print(reduce(add, [1, 2, 3, 4]))
print(add(add(add(1, 2), 3), 4))
>>10
```

reduce把一个函数作用在一个序列[x1, x2, x3, ...]上，这个函数必须接收两个参数，reduce把结果继续和序列的下一个元素做累积计算

```
def str2num(str):
    def char2int(s):
        return {'0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9}[s]
    
    def int2num(x, y):
        return 10*x + y
    return reduce(int2num, map(char2int, str))

print(str2num('12345'))
```

### filter

filter()把传入的函数依次作用于每个元素，然后根据返回值是True还是False决定保留还是丢弃该元素

```
def is_odd(n):
    return n % 2 == 1
print(filter(is_odd, [1, 2, 3, 4, 5, 6]))
>>[1, 3, 5]
```

### sort

排序过程中的比较过程

```
lists = [1, -12, 4, -2, 8]
print(sorted(lists, key = abs))
```

sorted()函数，可以接收一个key函数来实现自定义的排序
