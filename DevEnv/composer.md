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

**composer.lock**