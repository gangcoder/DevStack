# Apache 配置

## Aache虚拟主机

### 修改hosts

`C:\Windows\System32\drivers\etc\hosts `

### 引入httpd-vhosts.conf

`httpd.conf`

### 增加虚拟主机

<VirtualHost 192.168.1.11:80>
　　ServerName www.test1.com
　　DocumentRoot /www/test1/
　　<Directory "/www/test1">
 　　　　Options Indexes FollowSymLinks
　　　　 AllowOverride None
　　　　 Order allow,deny
　　 　　Allow From All
 　 </Directory>
</VirtualHost>

[参考](http://www.cnblogs.com/hi-bazinga/archive/2012/04/23/2466605.html)

## LAMP 环境搭建

`sudo apt-get install apache2`

## PHP

`sudo apt-get install php5`

Apache 调用 php5 模块

`cat /etc/apache2/mods-enabled/php5.load`

## MySQL

`sudo apt-get mysql-server`

安装php 调用 mysql

`sudo apt-get install php5-mysql`

`cat /etc/php5/conf.d/mysql.ini`

## 命令

一次安装AMP

`sudo apt-get install apache2 php5 mysql-server php5-mysql`

重启Apache

`sudo service apache2 restart`