<<<<<<< Updated upstream
# 代码结构

PHP本身灵活导致结构杂散

## MVC

使用Controller, Model, View目录管理文件;
使用ClassNameController, ClassNameModel, ClassNameView

## 调用

### 类调用

```
<?php 
/**
* 加载指定类型的类程序
**/
class Box {
    //声明一个进程内资源对象池
    public static $_modelObjArr;

    //获取一个资源对象
    public static function getObj($_appName,$_typeStr='class') {
        if($_typeStr == 'class'){
            $className = $_appName;
        } else {
            $className = $_appName.strtoupper($_typeStr);
        }

        //资源对象已创建 直接返回使用
        if(isset(self::$_modelObjArr[$className]) && is_object(self::$_modelObjArr[$className])){
            return self::$_modelObjArr[$className];
        }

        //加载文件资源类文件
        $file = dirname(__FILE__)."{$_appName}/{$_appName}.{$_typeStr}.php";
        if(file_exists($file)) {
            require_once $file;

            if(class_exists($className)) {
                return self::_createObj($className);
            } else {
                $errStr =  "no class {$className} in file {$file}"; //类名错误
            }
        } else {
            $errStr = "no class file {$file}"; //类文件错误
        }
        self::_showErr($errStr);
    }

    //创建资源对象
    public static function _createObj($_className) {
        if(isset(self::$_modelObjArr[$_className]) && is_object(self::$_modelObjArr[$_className])){
            return self::$_modelObjArr[$_className];
        } else {
            self::$_modelObjArr[$_className] = new $_className();
            return self::$_modelObjArr[$_className];
        }
    }
    
    //错误提示
    public static function _showErr($_errTypeStr=''){
        echo $_errTypeStr;  exit;
        //errorlog($_errTypeStr);
    }
}//end class
```

通过资源管理，自动维护资源的创建和调用

### 请求调用

让一个Controller类文件中的function运行

既将`xxxx.taobao.com/similar/opensearch/index.php`或者是 `xxx.etao.com/similar/opensearch.php`替换成实际的文件路径

```
<?php
var_dump($_SERVER["REQUEST_URI"]);
///git/Accumulate/LanguageCommon/Structure/RequestAttemper.php?abc=cba&123=321

$paramArr = explode( '/', trim(strtok(urldecode($_SERVER["REQUEST_URI"]),'?'),'/'));
$paramArr = array_merge($paramArr,$_GET);

var_dump($paramArr);
// array (size=8)
//   0 => string 'git' (length=3)
//   1 => string 'Accumulate' (length=10)
//   2 => string 'LanguageCommon' (length=14)
//   3 => string 'Structure' (length=9)
//   4 => string 'RequestAttemper.php' (length=19)
//   5 => string ' ' (length=1)
//   'abc' => string 'cba' (length=3)
//   6 => string '321' (length=3)
```

`$paramArr` 既包含Controller类名和function名

且url链接中可以直接包含参数 `/similar/opensearch/sort/` 中`sort`即为参数

## 应用目录结构

### 应用目录与物理目录分离

`/home/website/host/` 
这个目录只放index.php一个文件，和css,js,images一些没有加入cdn的呈现渲染文件。

将webserver的docmentroot 或者laction 设置在这个目录


`/home/website/app/` 
这个目录来存放编写的类程序文件，配置，由/host/index.php程序加载app目录下的类程序文件

### 访问结构

```
/website/host/index.php //访问目录跟应用目录物理上分类
/website/app/similaer
/website/app/cmp
/website/app/srp
/website/admin/firebox //添加项目另起目录
/website/system/box.class.php  //平台文件
/website/system/bin.class.php  //平台文件
/website/system/base.class.php //平台文件
```

响应的执行流程
```
webserver query
-> /website/host/index.php
-> include /website/system/box,bin,base (应用架构)| 平台
-> [/website/app/ (应用流程) | /website/admin/]页面

请求会到/website/host/index.php由index.php在根据请求规则，加载响应的逻辑程序。

### 开发目录

开发和维护过程中产生的程序

- php库文件，如curl通信,xml解析,log,timer,template(appview),等自己开发的类程序
- 第三方类库smarty,big2gb
- 模版
- shell脚本

```
/website/host/
/website/app/    //一个site是一个git分支
/website/script/run.php //响应CLI请求
/website/system/
/PHPlibs/custom/ //自己的类库, PHPlibs作为一个分支专人维护
/PHPlibs/other/  //第三方类库
webtemplate/srp
webtemplate/cmp
webtemplate/opensearch
```

### 代码部署

上线脚本分别检出，打包上线

## [代码规范](../codestyle.md)

```
/website/app/…. //应用程序
//对外访问目录
/website/host/index.php
/website/host/css
/website/host/js
/website/host/images
/website/host/images //平台系统文件
/website/script/ //调试，维护脚本
/webtemplate/…. //模板库 对应/website/app/下的目录
/PHPlibs/ //程序类库
/webdata //数据文件目录
```

[淘宝搜索](http://www.searchtb.com/2012/05/php_code_layout.html)
=======
# 代码结构

PHP本身灵活导致结构杂散

## MVC

使用Controller, Model, View目录管理文件;
使用ClassNameController, ClassNameModel, ClassNameView

## 调用

### 类调用

```
<?php 
/**
* 加载指定类型的类程序
**/
class Box {
    //声明一个进程内资源对象池
    public static $_modelObjArr;

    //获取一个资源对象
    public static function getObj($_appName,$_typeStr='class') {
        if($_typeStr == 'class'){
            $className = $_appName;
        } else {
            $className = $_appName.strtoupper($_typeStr);
        }

        //资源对象已创建 直接返回使用
        if(isset(self::$_modelObjArr[$className]) && is_object(self::$_modelObjArr[$className])){
            return self::$_modelObjArr[$className];
        }

        //加载文件资源类文件
        $file = dirname(__FILE__)."{$_appName}/{$_appName}.{$_typeStr}.php";
        if(file_exists($file)) {
            require_once $file;

            if(class_exists($className)) {
                return self::_createObj($className);
            } else {
                $errStr =  "no class {$className} in file {$file}"; //类名错误
            }
        } else {
            $errStr = "no class file {$file}"; //类文件错误
        }
        self::_showErr($errStr);
    }

    //创建资源对象
    public static function _createObj($_className) {
        if(isset(self::$_modelObjArr[$_className]) && is_object(self::$_modelObjArr[$_className])){
            return self::$_modelObjArr[$_className];
        } else {
            self::$_modelObjArr[$_className] = new $_className();
            return self::$_modelObjArr[$_className];
        }
    }
    
    //错误提示
    public static function _showErr($_errTypeStr=''){
        echo $_errTypeStr;  exit;
        //errorlog($_errTypeStr);
    }
}//end class
```

通过资源管理，自动维护资源的创建和调用

### 请求调用

让一个Controller类文件中的function运行

既将`xxxx.taobao.com/similar/opensearch/index.php`或者是 `xxx.etao.com/similar/opensearch.php`替换成实际的文件路径

>>>>>>> Stashed changes
