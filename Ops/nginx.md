# Nginx 使用

## 安装

- Ubuntu `sudo apt-get install nginx`

配置文件目录 `/etc/nginx/`

## 虚拟主机

`/etc/nginx/site-available/default`

```
{
    listen 80;
    server_name www.servername.com;
    index index.html index.php;
    root /usr/share/nginx/html;
}
```

重启服务 `server nginx restart`