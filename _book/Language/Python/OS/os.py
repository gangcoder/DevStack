import os
f = open('./hello.py')
data = f.read()
f.close()

f = open('./hello.py', 'a')
f.writelines(['test','1', '2'])
f.close()

f = open('./hello.py', 'r')
data = f.readlines()
#print(data)
f.close()

f = open('./hello.py', 'r')
iterF = iter(f)

lines = 0
for line in iterF:
    lines = lines+1

#print(lines)

f = open('./hello.py')
data = f.read(3)
print(f.tell()) #当前指针位置
print(data)
f.seek(os.SEEK_SET) #设置指针位置
print(f.tell())
f.close()
