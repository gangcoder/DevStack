# PHP伪静态

伪静态又名URL重写，是动态的网址看起来像静态的网址。
既动态网页通过重写 URL 方法实现调用动态网页的参数，但在实际的网页目录中并没有存在重写的页面。

```
//获取文件路径
$paramArr = explode( '/', trim(strtok(urldecode($_SERVER["REQUEST_URI"]),'?'),'/'));
$paramArr = array_merge($paramArr,$_GET);
var_dump($paramArr);die();
```

[引用](http://www.cnblogs.com/ainiaa/archive/2010/07/25/1784564.html)