# 字符集

计算机中的常用字符是ASCII编码, 即8位二进制数表示一个字符，总共可以表示256个字符。

由于不能统一表示各语言字符，因此有了Unicode编码 ，Unicode的一种实现即为UTF-8

为了和ASCII码兼容 ，Unicode的前256个字符与ASCII码完全相同

**占用字符**

- ASCII 1byte
- UTF-8 动态，汉字占3byte
- GBK 汉字占2byte