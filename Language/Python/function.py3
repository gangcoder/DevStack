#!/usr/bin/env python
#@author xugang
#@date   2015.5

def my_abs():
    if x >= 0:
        return x
    else:
        return -x

nu = [3, 1, 2]
print(nu)

def sor(*num):
    print(num[1])

sor(*nu)
print(nu)

# 必选参数、默认参数、可变参数和关键字参数。
def func(a, b, c=0, *args, **kw):
    print('a=', a, 'b=', b, 'c=', c, 'args=', args, 'kw=', kw)