## 模块

文件称为模块，目录称为包。\_\_init\_\_.py对应包的模块名

### 模块模版

```
#!/usr/bin/env python3
# -*- coding: utf-8 -*-

'a test module' #模块的文档注释

__author__ = 'xg'

import sys

def test():
    args = sys.argv
    if len(args) == 1:
        print('hello world')
    elif len(args) == 2:
        print('hello %s!'%args[1])
    else:
        print('too many argument')

if __name__ == '__main__': #命令行直接调用模块时__name__被设为main
    test()
```

### 作用域

- `_`,`__` 实现类似private功能,不应该直接引用
- `__doc__` 特殊变量，可以直接引用，有特殊用途

```
def _private_1(name):
    return 'Hello, %s' % name

def _private_2(name):
    return 'Hi, %s' % name

def greeting(name):
    if len(name) > 3:
        return _private_1(name)
    else:
        return _private_2(name)
```

外部不需要引用的函数全部定义成private, 外部引用定义为public

## 安装模块

模版安装 pip

```
pip install Pillow
```

python3对应pip3

### 模块搜索路径

Python搜索当前路径，内置模块，第三方模块

搜索路径保存在sys模块的path路径中

```
import sys
sys.path
```

### 修改搜索路径

1. 修改sys.path

```
import sys
sys.path.append('/usr/model')
```
运行时修改，运行结束后失效

2. 修改PYTHONPAT环境变量
