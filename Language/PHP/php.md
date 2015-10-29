# PHP

## PHP 高级应用

- SPL
- Trait

## 编译安装

### 安装依赖环境

`php-mcrypt libmcrypt libmcrypt-devel`

**bison**

```
wget http://ftp.gnu.org/gnu/bison/bison-2.6.4.tar.gz
tar -xvzf bison-2.6.4.tar.gz
cdbison-2.6.4
./configure
make&& makeinstall
```

**re2c**

need re2c 0.13.4 or later

```
wget http://sourceforge.net/projects/re2c/files/re2c/0.13.5/re2c-0.13.5.tar.gz/download
tar zxf re2c-0.13.5.tar.gz && cdre2c-0.13.5
./configure
make&& makeinstall
```

### 编译PHP7

```
# 下载源代码
git clone http://git.php.net/repository/php-src.git
cd php-src
./buildconf
# 配置参数
./configure 
--prefix=/usr/local/php7 \ 安装目录
--with-config-file-path=/usr/local/php7/etc \ PHP7的配置目录
--with-mcrypt=/usr/include \
--with-mysql=mysqlnd  \ PHP7依赖的库
--with-mysqli=mysqlnd  \
--with-pdo-mysql=mysqlnd  \
--with-gd  \
--with-iconv  \
--with-zlib  \
--enable-xml  \
--enable-bcmath  \
--enable-shmop  \
--enable-sysvsem  \
--enable-inline-optimization  \
--enable-mbregex  \
--enable-fpm  \
--enable-mbstring  \
--enable-ftp \
--enable-gd-native-ttf  \
--with-openssl  \
--enable-pcntl  \
--enable-sockets  \
--with-xmlrpc  \
--enable-zip  \
--enable-soap  \
--without-pear  \
--with-gettext  \
--enable-session  \ 允许php会话session
--with-curl  \
--with-jpeg-dir \
--with-freetype-dir \
--enable-opcache \ 使用opcache缓存
--enable-fpm \
--enable-fastcgi \
--with-fpm-user=nginx \ php-fpm的用户
--with-fpm-group=nginx \ php-fpm的用户组
# 编译安装
make&& sudomakeinstall
```

### 编译问题解决

编译安装php时出现 /encodings.c:101: undefined reference to `libiconv_close’ 错误的解决方法

bug（https://bugs.php.net/bug.php?id=52611）

configure以后要手动修改下Makefile文件

找到EXTRA_LIBS 在最后添加 -liconv 即可顺利通过
（大约在Makefile文件的104）
`EXTRA_LIBS = -lcrypt -lz -lresolv -lcrypt -lrt -lmysqlclient -lmcrypt -lltdl -lpng -lz -ljpeg -lcurl -lz -lrt -lm -ldl -lnsl -lxml2 -lz -lm -ldl -lssl -lcrypto -lcurl -lxml2 -lz -lm -ldl -lfreetype -lmysqlclient -lz -lm -lssl -lcrypto -ldl -lxml2 -lz -lm -ldl -lxml2 -lz -lm -ldl -lcrypt -lxml2 -lz -lm -ldl -lxml2 -lz -lm -ldl -lxml2 -lz -lm -ldl -lxml2 -lz -lm -ldl -lssl -lcrypto -lcrypt -liconv`

### 复制配置文件

```
cp php.ini-production /usr/local/php7/etc/php.ini
cp sapi/fpm/init.d.php-fpm /etc/init.d/php7-fpm
ch mod+x /etc/init.d/php7-fpm
cp /usr/local/php7/etc/php-fpm.conf.default /usr/local/php7/etc/php-fpm.conf
cp /usr/local/php7/etc/php-fpm.d/www.conf.default /usr/local/php7/etc/php-fpm.d/www.conf
```


### 设置PHP开机启动

测试配置文件是否正确

```
#配置开机自启动，增加到主机sysV服务
$ sudo chmod +x /etc/init.d/php-fpm
$ sudo chkconfig --add php-fpm
$ sudo chkconfig php-fpm on

#测试PHP的配置文件是否正确合法
$ sudo php-fpm -t
>>>[03-May-201517:50:04] NOTICE: configuration file /usr/local/php7/etc/php-fpm.conf test is successful
```

**启动php服务**

```
service php-fpm start
Starting php-fpm  done
```

### 配置opcache

```
vim /usr/local/php7/etc/php.ini
# 加入
zend_extension=/usr/local/php7/lib/php/extensions/no-debug-non-zts-20141001/opcache.so
# 启动
/etc/init.d/php7-fpmstart
```

>参考

## FPM-PHP 配置

[https://typecodes.com/web/php7configure.html](https://typecodes.com/web/php7configure.html)

- [http://www.hdj.me/php7-install-note?utm_source=tuicool](http://www.hdj.me/php7-install-note?utm_source=tuicool)