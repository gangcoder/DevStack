# Gitbook

## 文档

- [help document](http://help.gitbook.com)
- [Gitbook使用入门](http://gitbook-zh.wanqingwong.com/)

## 基本使用

- 详细步骤请参见 Gitbook使用入门
- [自定义配置参考](https://github.com/codepiano/gitbook)

## 使用策略

建立两个Git仓库，一个用于保存源码，一个用于保存静态页面

保存建台页面的Github可以使用 Github Page作为[发布](http://hubeixugang.github.io/)空间

具体搭建可以参考网上教程，搭建后的配置可以参考本文的[Github](https://github.com/hubeixugang/Accumulate)

以下是编译后复制脚本
```
#!/bin/bash
echo 'build gitbook start...'
gitbook build
echo 'copy static html to githuo.io...'
cp -u -r _book/* /home/vagrant/git/hubeixugang.github.io
echo 'copy done'
```

## 插件

- [plugin](http://plugins.gitbook.com/) 插件官网
- [collapsible](https://www.npmjs.com/package/gitbook-plugin-collapsible-menu) 目录列表折叠
- [gtoc](https://github.com/boycgit/gitbook-plugin-gtoc) 页面目录

## book.json

```
{
    "title":"Outer Brain Manual",
    "description":"blog of xg",
    "plugins": ["collapsible-menu", "gtoc"], //添加插件
    "links": {
        "contribute": false,
        "sidebar": { //左边栏顶部添加链接
            "About Author":"https://github.com/hubeixugang",
            "Questions and Issues":"https://github.com/hubeixugang/Accumulate/issues",
            "Eidt and Contribute":"https://github.com/hubeixugang/Accumulate"
        },
        "tail": { //左边栏底部添加链接,不知道怎么回事,没有效果
            "Xu Gang":"mailto:hubeixugang@163.com"
        },
        "gitbook":"false",
        "sharing":{
             "google": null,
             "facebook": null,
             "twitter": null,
             "weibo": null,
             "qrcode": true,
             "all": null
        }
    },
    "gitbook": ">=2.0.0"
}
```
