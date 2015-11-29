# SQL注入

用户文本框输入` 'or '1' = '1' or '1'='1`

`select * from student where username = '' or '1' = '1' or '1' = '1' and password = ''`

密码文本框输入 `1' or '1' = '1`

`select * from student where username = '' and password = '' or '1' = '1'`

用户名文本框输入 `tom'; drop table student--`

`select * from student where username = 'tom'; drop table student --'and password = ''`

## 防止SQL注入

1. 不要信任用户输入
2. 不要动态拼接SQL
3. 不要使用管理员权限连接数据库
4. 自测