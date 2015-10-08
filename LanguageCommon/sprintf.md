## sprinf 函数

1. 格式化数字字符串

```
-- string.format (formatstring, ···)
-- 把整数123打印成一个字符串
print(string.format('%d', 123)) -- 产生“123″
-- 指定宽度，不足的左边补空格
print(string.format('%8d%8d', 123, 123)) -- 产生：“    123    123″
-- 指定宽度，不足的右边补空格
print(string.format('%-8d%8d', 123, 123)) --123          123
-- 16进制
print(string.format('%x', 123)) -- 7b
-- 16进制，指定宽度，不足补0
print(string.format('%08x', 123)) -- 0000007b
```

2. 控制浮点数打印格式

```
-- 浮点数使用格式符'%f'控制，默认保留小数点后6位
print(string.format('%f', 3.1415926)) -- 3.141593
-- 控制打印宽度和小数位数 '%m.nf' m 打印的宽度，n 小数点后位数
print(string.format('%-10.3f%d', 3.1415926, 123)) -- 3.142     123
```

3. 连接字符串

```
-- n从符串中截取字符
local i = 'abc'
print(string.format('%.2s', i))
-- '*'来占用一个本来需要一个指定宽度或精度的常数数字的位置
-- sprintf(s, “%.*s%.*s”, 7, a1, 7, a2); lua不支持
print(string.format('%#x', 123)) -- '#'产生0X
```

4. 打印地址信息

```
-- 地址或者指针是32位的数，可以使用无符号整数的'%u'打印
-- sprintf(s, “%u”, &i);
```