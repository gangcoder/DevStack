def add(x, y, f):
    return f(x) + f(y)

print(add(5, -6, abs))

def f(x):
    return x*x

r = map(f, [1, 2, 3, 4, 5])
print(r)

from functools import reduce

def add(x, y):
    return x+y

print(reduce(add, [1, 2, 3]))

def fn(x, y):
    return x*10+y

def char2num(s):
    return {'0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9}[s]

print(reduce(fn, [1, 2, 3]))
print(type(reduce(fn, map(char2num, '12344'))))
