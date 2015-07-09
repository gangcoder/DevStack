# Shell

## 概念

- shell 用户访问操作系统的一个应用程序
- shell script 为shell编写的程序

### shell种类 

- Bourne Shell（/usr/bin/sh或/bin/sh）
- Bourne Again Shell（/bin/bash）常用
- C Shell（/usr/bin/csh）
- K Shell（/usr/bin/ksh）
- Shell for Root（/sbin/sh）

```
#!/bin/bash #以特定解释器执行脚本
echo 'build gitbook start...'
gitbook build
echo 'copy static html to githuo.io...'
cp -u -r _book/* ../hubeixugang.github.io
echo 'copy done'
```

### 运行方式

1. 可执行程序

```
chmod +x ./test.sh #增加执行权限
./test.sh #执行脚本
```

2. 解释器参数

`/bin/bash test.sh`
