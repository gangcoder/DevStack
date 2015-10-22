#!/usr/bin/env python
#-*-coding:utf-8-*-
#@author xugang
#@date   2015.5

a = 100
if a>=0:
    print(a)
else:
    print(-a)

b = '''
    ...line1
    ...line2
    ...line3'''
print(b)

print(10/3)

print('中文')

# list
classmates = ['Michael', 'Bob', 'Tracy']
print(classmates)

# tuple
classmates = ('Michael', 'Bob', 'Tracy')
print(classmates)

# 控制接口
for mate in classmates:
    print(mate)

sum = 0
for x in range(1,100):
    sum +=x
print(sum)

print(range(1,100))

sum = 0
n = 99
while n>0:
    sum = sum + n
    n = n - 2
    print(sum)

# dict
score = {'Michael': 95, 'Bob': 75, 'Tracy': 85}
print(score)

# set
s = set([1,2,3])
print(s)

def fact(n):
    if n == 1:
        return 1
    return n*fact(n-1)

def fact(n):
    return fact_iter(n,1)

def fact_iter(num, product):
    if num ==1:
        return product
    return fact_iter(num-1, num*product)

# fact(5)
# fact_iter(5,1)
# fact_iter(4,5*1)
# fact_iter(3,5*1*4)
# fact_iter(2,5*1*4*3)

{i:
    i * i
    for i in xrange(100)
} 