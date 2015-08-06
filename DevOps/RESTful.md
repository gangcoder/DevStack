# RESTful API

## 基本原则

- 当标准合理的时候遵守标准。
- API应该对程序员友好，并且在浏览器地址栏容易输入。
- API应该简单，直观，容易使用的同时优雅。
- API应该具有足够的灵活性来支持上层ui。
- API设计权衡上述几个原则。

## 资源

API拆分为逻辑上的资源，对应HTTP进行操作(GET, PUT, POST, DELETE)

### URL 和 Action

- POST 新建
- GET 获取
- PUT 更新
- DELETE 删除

URL命名规则: endpoint /resource

- GET /tickets # 获取ticket列表
- GET /tickets/12 # 查看某个具体的ticket
- POST /tickets # 新建一个ticket
- PUT /tickets/12 # 更新ticket 12.
- DELETE /tickets/12 #删除ticekt 12

- 使用名词
- 使用特定领域的名称 

### 资源关联


- GET /tickets/12/messages- Retrieves list of messages for ticket #12
- GET /tickets/12/messages/5- Retrieves message #5 for ticket #12
- POST /tickets/12/messages- Creates a new message in ticket #12
- PUT /tickets/12/messages/5- Updates message #5 for ticket #12
- PATCH /tickets/12/messages/5- Partially updates message #5 for ticket #12
- DELETE /tickets/12/messages/5- Deletes message #5 for ticket #12

### 过滤，排序，搜索

url最好越简短越好，和结果过滤，排序，搜索相关的功能都应该通过参数实现

### 限制返回域

API使用者不需要所有结果

横向限制: 例如值返回API结果的前十项

纵向限制: 仅返回一条记录的部分数据

提高网络带宽使用率和速度

## 其他

### 不符合CURD的操作

- 重构
- 子资源
- 文档

### SSL

### 文档

- 容易获得
- 请求和输出示例
- 对成功或错误的响应都能提供预期结果
- 记录下每一个错误码并提供完整的信息

### 版本化

url包含主版本信息，请求头包含子版本信息

### 返回

- 更新和创建操作应该返回资源
- 使用gzip

JSON响应文档具备相同结构

*meta*: 结果信息

*data*: 结果数据

### 输入

JSON 格式参数

注意使用: `Content-Type：application/json`

### 分页

### 速度限制

HTTP 429 too many requests

### Authentication

RESTful API属无状态，使用SSL

## 错误处理

- 400系列表明客户端错误：如错误的请求格式等
- 500系列表示服务器错误

*JSON*

一个有用的错误信息，一个唯一的错误码，以及任何可能的详细错误描述

```
{
    "meta" : {
        "code" : 1234,
        "message" : "Something bad happened :-(",
        "description" : "More details about the error here"
    },
    "data" : {
    }
}
```

- 200 ok  - 成功返回状态，对应，GET,PUT,PATCH,DELETE.
- 201 created  - 成功创建。
- 304 not modified   - HTTP缓存有效。
- 400 bad request   - 请求格式错误。
- 401 unauthorized   - 未授权。
- 403 forbidden   - 鉴权成功，但是该用户没有权限。
- 404 not found - 请求的资源不存在
- 405 method not allowed - 该http方法不被允许。
- 410 gone - 这个url对应的资源现在不可用。
- 415 unsupported media type - 请求类型错误。
- 422 unprocessable entity - 校验错误时用。
- 429 too many request - 请求过多。

- [REST简介](http://blog.jobbole.com/88551/)
- [再谈RESTAPI最佳实践](http://blog.jobbole.com/70511/)