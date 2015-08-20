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