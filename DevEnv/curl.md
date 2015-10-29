## curl

### 查看网页源码

`curl www.sina.com`

### 保存页面 `-o`

`curl -o [文件名] www.sina.com`

直接在curl命令后加上网址，就可以看到网页源码。
如果要把这个网页保存下来，可以使用-o参数，这就相当于使用wget命令了。

### 自动跳转 `-L`

`curl -L www.sina.com`

有的网址是自动跳转的。使用-L参数，curl就会跳转到新的网址。

### 显示头信息 `-i`

`curl -i www.sina.com`

-i 参数可以显示http response的头信息，连同网页代码一起。

```
curl -i www.sina.com
HTTP/1.0 301 Moved Permanently
Date: Sat, 03 Sep 2011 23:44:10 GMT
Server: Apache/2.0.54 (Unix)
Location: http://www.sina.com.cn/
Cache-Control: max-age=3600
Expires: Sun, 04 Sep 2011 00:44:10 GMT
Vary: Accept-Encoding
Content-Length: 231
Content-Type: text/html; charset=iso-8859-1
Age: 3239
X-Cache: HIT from sh201-9.sina.com.cn
Connection: close

301 Moved Permanently
Moved Permanently
```

-I 参数则是只显示http response的头信息。

### 显示通信过程 `-v`

-v 参数可以显示一次http通信的整个过程，包括端口连接和http request头信息。

```
curl -v www.sina.com
* About to connect() to www.sina.com port 80 (#0)
* Trying 61.172.201.195... connected
* Connected to www.sina.com (61.172.201.195) port 80 (#0)
> GET / HTTP/1.1
> User-Agent: curl/7.21.3 (i686-pc-linux-gnu) libcurl/7.21.3 OpenSSL/0.9.8o zlib/1.2.3.4 libidn/1.18
> Host: www.sina.com
> Accept: */*
>
* HTTP 1.0, assume close after body
< HTTP/1.0 301 Moved Permanently
< Date: Sun, 04 Sep 2011 00:42:39 GMT
< Server: Apache/2.0.54 (Unix)
< Location: http://www.sina.com.cn/
< Cache-Control: max-age=3600
< Expires: Sun, 04 Sep 2011 01:42:39 GMT
< Vary: Accept-Encoding
< Content-Length: 231
< Content-Type: text/html; charset=iso-8859-1
< X-Cache: MISS from sh201-19.sina.com.cn
< Connection: close
<
301 Moved Permanently
Moved Permanently

The document has moved here.
```

### 跟踪详细信息 `trace`

如果你觉得上面的信息还不够，那么下面的命令可以查看更详细的通信过程。
`curl --trace output.txt www.sina.com`

`curl --trace-ascii output.txt www.sina.com`
运行后，请打开output.txt文件查看。

### 发送表单信息 `--data 'data'`

发送表单信息有GET和POST两种方法。

GET方法相对简单，只要把数据附在网址后面就行。

`curl example.com/form.cgi?data=xxx`

POST方法必须把数据和网址分开，curl就要用到--data参数。

`curl --data "data=xxx" example.com/form.cgi`

如果你的数据没有经过表单编码，还可以让curl为你编码，参数是--data-urlencode。

`curl --data-urlencode "date=April 1" example.com/form.cgi`

### HTTP动词 `-X 'method'`

curl默认的HTTP动词是GET，使用-X参数可以支持其他动词。

`curl -X POST www.example.com`

`curl -X DELETE www.example.com`


### 文件上传 `--form`

你可以用curl这样上传文件：

`curl --form upload=@localfilename --form press=OK [URL]`

### Referer字段

有时你需要在http request头信息中，提供一个referer字段，表示你是从哪里跳转过来的。

`curl --referer http://www.example.com http://www.example.com`

### User Agent字段 `--user-agent`

这个字段是用来表示客户端的设备信息。服务器有时会根据这个字段，针对不同设备，返回不同格式的网页，比如手机版和桌面版。
iPhone4的User Agent是`Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_0 like Mac OS X; en-us) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8A293 Safari/6531.22.7`

curl可以这样模拟：

`curl --user-agent "[User Agent]" [URL]`


### cookie `--cookie`

使用--cookie参数，可以让curl发送cookie。

`curl --cookie "name=xxx" www.example.com`

至于具体的cookie的值，可以从http response头信息的Set-Cookie字段中得到。

### 增加头信息 `--header`

有时需要在http request之中，自行增加一个头信息。--header参数就可以起到这个作用。

`curl --header "Content-Type:application/json" http://example.com`


### HTTP认证 `--user`

有些网域需要HTTP认证，这时curl需要用到--user参数。

`curl --user name:password example.com`
