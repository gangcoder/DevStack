# Composer

Composer 是 PHP 的一个依赖管理工具。申明项目所依赖的代码库，Composer会在项目中安装他们

## 依赖管理

以项目为基础进行管理

- 项目依赖若干库，且库存在其他依赖
- 声明依赖
- Composer进行安装

### 声明依赖关系

```
{
    "require": {
        "monolog/monolog": "1.2.*"
    }
}
```

### 系统要求

需要PHP5.3 以上版本，涉及敏感选项

从包的来源直接安装，需要git, svn

### 安装

```curl -sS https://getcomposer.org/installer | php```

### 全局安装

移动到PATH目录

## 基本使用

### composer.json

创建 require Key

```
{
    "require": {
        "monolog/monolog": "1.0.*"
    }
}
```
- 包名称 供应商名称和其项目名称构成
- 包版本 表示任何从 1.0 开始的开发分支

### 安装依赖包

`composer install`

将monolog/monolog 的最新版本下载到 vendor 目录

第三方的代码到一个指定的目录 vendor

> 可以通过直接运行 `composer require cebe/markdown "~1.0.1"` 方式安装

**composer.lock**

安装依赖后，Composer 将把安装时确切的版本号列表写入 composer.lock 文件, 以锁定该项目的特定版本

install 命令将会检查`composer.lock`是否存在, 如果存在下载指定版本而忽略 composer.json

update 命令将获取最新匹配的版本（根据你的 composer.json 文件）并将新版本更新进锁文件

## Packagist

[composer 资源库](https://packagist.org/)

### 自动加载

composer 生成`vendor/autoload.php` 以支持自动加载

```require 'vendor/autoload.php';```

**自定义autoload**

```
{
    "autoload": {
        "psr-4": {"Acme\\": "src/"}
    }
}
```

 PSR-4 autoloader 到 Acme 命名空间

引用`vendor/autoload.php`将返回 autoloader 的实例

**classmap**

允许不符合 PSR-0 规范的类被自动加载

