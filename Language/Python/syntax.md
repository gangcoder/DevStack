# Python 语法

## 语法

### 数据类型

- 整数 int
- 浮点 float
- 字符串 string
- 复数 complex
- 布尔 bool
- 空值 None
- 变量


#### list

集合

	>>> classmates = ['Michael', 'Bob', 'Tracy']
	>>> len(classmates)
	3


#### tuple

tuple和list非常类似，但是tuple一旦初始化就不能修改


\>>> classmates = ('Michael', 'Bob', 'Tracy')


#### dict

全程dictionary, 使用键-值（key-value）存储

	>>> d = {'Michael': 95, 'Bob': 75, 'Tracy': 85}
	>>> d['Michael']
	95
	

#### set

set和dict类似，也是一组key的集合，但不存储value。由于key不能重复，所以，在set中，没有重复的key


	>>> s = set([1, 2, 3])
	>>> s
	{1, 2, 3}


### 结构

#### 判断

#### if ####
	age = 20
	if age > 18 :
	    print('You age is:', age)

#### if ... else ####
	age = 3
	if age >= 18:
	    print('your age is', age)
	    print('adult')
	else:
	    print('your age is', age)
	    print('teenager')
#### if ...elif ####
	age = 3
	if age >= 18:
	    print('adult')
	elif age >= 6:
	    print('teenager')
	else:
	    print('kid')


#### 循环

#### for ... in ####

	names = ['Michael', 'Bob', 'Tracy']
	for name in names:
    	print(name)


#### while ####

	n = 99
	while n > 0:
   	 	print(n)
    	n = n - 2


### 函数

函数名、括号、括号中的参数和冒号: 缩进块中编写函数体 函数的返回值用return语句返回

	def my_abs(x):
   	 	if x >= 0:
       	 	return x
    	else:
        	return -x

空函数

```
def nop():
    pass
```

函数名可以赋给一个变量，相当于给函数取了一个别名


	>>>a=ord
	>>>a('a')
	97


#### 多重返回值


	import math

	def move(x, y, step, angle=0):
    	nx = x + step * math.cos(angle)
    	ny = y - step * math.sin(angle)
    	return nx, ny

	>>>r = move(100, 100, 60, math.pi / 6)
	>>> print(r)
	(151.96152422706632, 70.0)


返回值是一个tuple

#### 位置参数
必须要传入的参数 **x**

	def power(x):
		return x*x


####默认参数
可以传入或不传入参数 **n**，可以改变**n**值，如果需要的话

	def power(x,n=2):
		s=1
		while n>0:
			n=n-1
			s=s*x
		return s

#### 可变参数
传入的参数**\*numbers**是可变的，0个或任意参数

	def calc(*numbers):
    	sum = 0
    	for n in numbers:
        	sum = sum + n * n
  	  	return sum


	>>>nums = [1, 2, 3]
	>>>calc(*nums)
	14


#### 关键字参数
传入0个或任意个的**键-值对**，即**dict**

	def person(name,age,**kw):
		print('name:',name,'age:',age,'other:',kw)


	>>> person('Bob', 35, city='Beijing')
	name: Bob age: 35 other: {'city': 'Beijing'}
	>>> person('Adam', 45, gender='M', job='Engineer')
	name: Adam age: 45 other: {'gender': 'M', 'job': 'Engineer'}

#### 命名关键字参数 ####
限制传入的关键字参数，使用 **\***

	def person(name, age, *, city, job):
    	print(name, age, city, job)
传入的关键字参数必须为：

	>>> person('Jack', 24,city='Beijing', job='Engineer')
	Jack 24 Beijing Engineer
并且传入的关键字可以有缺省值：

	def person(name, age, *, city='Beijing', job):
	    print(name, age, city, job)

	>>> person('Jack', 24, job='Engineer')
	Jack 24 Beijing Engineer
	
#### 参数组合 ####

在Python中定义函数，可以用必选参数、默认参数、可变参数、关键字参数和命名关键字参数，这5种参数都可以组合使用，除了可变参数无法和命名关键字参数混合。参数定义的顺序必须是：必选参数、默认参数、可变参数/命名关键字参数和关键字参数。

	def f1(a, b, c=0, *args, **kw):
	    print('a =', a, 'b =', b, 'c =', c, 'args =', args, 'kw =', kw)
	
	def f2(a, b, c=0, *, d, **kw):
	    print('a =', a, 'b =', b, 'c =', c, 'd =', d, 'kw =', kw)