def add(x, y):
    return x + y
print(reduce(add, [1, 2, 3, 4]))
print(add(add(add(1, 2), 3), 4))

def str2num(str):
    def char2int(s):
        return {'0': 0, '1': 1, '2': 2, '3': 3, '4': 4, '5': 5, '6': 6, '7': 7, '8': 8, '9': 9}[s]
    
    def int2num(x, y):
        return 10*x + y
    return reduce(int2num, map(char2int, str))

print(str2num('12345'))
