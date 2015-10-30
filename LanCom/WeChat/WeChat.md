# 微信开发笔记


## 资料连接

- [公众平台官网](mp.weixin.qq.com)
- [微信公众平台开发者文档](http://mp.weixin.qq.com/wiki/home/index.html)
- [测试帐号登录](http://mp.weixin.qq.com/debug/cgi-bin/sandbox?t=sandbox/login)
- [SAE](http://sae.sina.com.cn)
- [百度地图](http://developer.baidu.com/map/)


## [验证服务器有效性](http://mp.weixin.qq.com/wiki/17/2d4265491f12608cd170a95559800f2d.html)


## 开发模式

微信客户端 --> 微信公众平台 --> 开发者


## [access_token](http://mp.weixin.qq.com/wiki/11/0e4b294685f817b95cbed85ba5e82b8f.html)

公众号调用各接口时都需使用access_token作为全局唯一票据。

需要中控服务器提供access_token，供其他业务逻辑服务器使用。避免业务逻辑各自刷新access_token，造成冲突。

公众号接口调用次数限制：为了防止公众号的程序错误而引发微信服务器负载异常，默认情况下，每个公众号调用接口都不能超过一定限制


## [QRCode](http://mp.weixin.qq.com/wiki/18/28fc21e7ed87bec960651f0ce873ef8a.html)

公众平台提供了生成带场景值二维码的接口，用户扫描后，公众号可以接收到事件推送。

创建二维码步骤：

1. 创建二维码ticket
2. 凭借ticket到指定URL换取二维码


## 关注

公众平台发送关注消息

[关注事件](http://mp.weixin.qq.com/wiki/2/5baf56ce4947d35003b86a9805634b1e.html)


服务器响应消息

[被动回复](http://mp.weixin.qq.com/wiki/14/89b871b5466b19b3efa4ada8e577d45e.html)


## [接受消息](http://mp.weixin.qq.com/wiki/10/79502792eef98d6e0c6e1739da387346.html)

### 普通消息

- 文本 text
- 图片 image
- 语音 voice
- 视频 video
- 小视频 shortvideo
- 地理位置
- 链接

通过消息体的MsgType 进行区分

**文本消息**：（小黄鸡机器人）


**媒体消息**：图片，语音，视频，小视频

MediaId 表示当前媒体的唯一标识

**地图**

配合地图API进行后续操作


## [发送消息](http://mp.weixin.qq.com/wiki/14/89b871b5466b19b3efa4ada8e577d45e.html)

### 被动回复用户消息

- 回复文本消息
- 回复图片消息
- 回复语音消息
- 回复视频消息
- 回复音乐消息
- 回复图文消息

**文本消息**

**媒体类消息** 图片，语音，视频

**图文** 展示图片和文字消息

将需要发送的媒体上传到公众平台服务器，再使用XML格式回复给公众平台服务器

## [素材管理](http://mp.weixin.qq.com/wiki/5/963fc70b80dc75483a271298a76a8d59.html)

发送到公众平台的素材


## 自定义菜单

户端菜单有缓存（24h），可以通过取消关注，再重新关注的方式查看效果

### [创建菜单](http://mp.weixin.qq.com/wiki/13/43de8269be54a0a6f64413e4dfa94f39.html)

### [删除菜单](http://mp.weixin.qq.com/wiki/16/8ed41ba931e4845844ad6d1eeb8060c8.html)
