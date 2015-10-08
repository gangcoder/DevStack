# python os

## read
- `open` 打开文件，返回文件句柄
- `read(size)` 读取文件
- `readline(size)` 读取文件的一行
- `readlines(size)` 读取文件所有内容到列表
- iter 使用迭代器操作文件

```
f = open('./hello.py')
data = f.read()
f.close()
```


## write

- write(str) 写文件
- writelines(sequence of string) 写一行

```
f = open('./hello.py', 'a')
f.writelines(['test','1', '2'])
f.close()
```

## 缓存

缓存写入磁盘

- 主动调用 close, flush
- 写入数据大于buffer

`ps -A |grep 进程名` 找到进程ID

`cat /proc/进程ID/limits` 查看该进程允许打开的文件数

## 指针

- seek() 设置文件指针
- tell() return current file position

- os.SEEK_SET
- os.SEEK_CUR
- os.SEEK.END

```
f = open('./hello.py')
data = f.read(3)
print(f.tell()) #当前指针位置
print(data)
f.seek(os.SEEK_SET) #设置指针位置
print(f.tell())
f.close()
```

## sys

### std

- stdin
- stdout
- stderr

标准输入输出

### arg

```
import sys

if __name__ == '__main__':
    print(len(sys.argv))
    for arg in sys.argv:
        print(arg)
```

## codecs

codecs.open 打开指定编码文件

## OS 

`os`模块操作文件

- os.open(filename, flag[,mode])
- os.read(fd, buffersize)
- os.lseek()
- os.close()
- os.listdir()
- os.access()

```
os.access('./imooc.txt', os.R_OK)
os.listdir('/')
```

## ini文件操作

### ini

节: [session]

参数(键=值) name=value

### ConfigParser

```cfg = configparser.configparser 初始化
cfg.read('path')
cfg.sections() #节

for se in cfg.sections():
    print(se)
    print(cfg.items(se))
```
