# gzip

- LZ77: 基于字典的无损数据压缩算法（还有 LZ78, LZW 等）
- deflate: 一种数据压缩算法,先用 LZ77 压缩，然后用霍夫曼编码压缩
- gzip: 一种文件结构，通过 defalte 算法压缩数据，然后加上文件头和CRC校验
- zlib: 提供了 deflate, zlib, gzip 压缩方法函数库；也是一种压缩格式,用 deflate 压缩数据，然后加上 zlib 头和 adler32 校验

**十六进制**

```
string: 11aa@#@23123szadler32adler32adler32f..adler32adler32
deflate:                       3334 4c4c 7450 7630 3236 3432 2eae 4a4c c949 2d32 3642 a5d2 f4f4 5005 00
zlib: 78da                     3334 4c4c 7450 7630 3236 3432 2eae 4a4c c949 2d32 3642 a5d2 f4f4 5005 00a7 2c10 93
gzip: 1f8b 0800 0000 0000 020b 3334 4c4c 7450 7630 3236 3432 2eae 4a4c c949 2d32 3642 a5d2 f4f4 5005 002e 783b b334 0000 00
```

- zlib头: 78da
- gzip头: 1f8b 0800 0000 0000 020b

[gzip.php](gzip.php)

[zlib, gzip, deflate格式转换](http://www.cnblogs.com/wc1217/archive/2013/03/09/2951657.html)