# PHPFPM使用笔记

## 显示错误

php.ini

```
display_errors = On
error_reporting = E_ALL
```

php-fpm.conf

```
; PHP-FPM错误提示
php_flag[display_errors] = On
```

重启phpfpm