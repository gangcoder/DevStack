# Shell 语法

## 变量

```
name='John' #or declare name='Docn' 定义局部变量
export NAME='Don' #定义全局变量
echo "$name""$NAME" #双引号内 $ 引用名称对应内容
```
## 输入

```
read commit #从命令行读取一行内容
echo "$commit"
```
