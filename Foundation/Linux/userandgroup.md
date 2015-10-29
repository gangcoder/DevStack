# 用户和组

`用户`: 限制使用者和进程可以使用的资源

`组`: 用来管理用户

- UserID: 标识用户
- 用户属于一个主组和多个附属组
- GroupID: 标识组
- 进程以用户身份运行，并受该用户可访问资源的限制
- 每个登录用户拥有一个指定shell

## 用户

用户ID为32位，从0开始

**用户分类**

- root     id为0
- 系统用户 1~499
- 普通用户 >500

系统文件都有一个所属用户及所属组

**命令**

- `id`命令可以显示当前用户信息
- `passwd` 修改密码

**相关文件**

- /etc/passwd 用户信息
- /etc/shadown 密码
- /etc/group 组信息

### passwd 记录

- 用户名
- x 表示密码保存在/etc/shadown
- id号
- 组id
- 用户描述信息
- 用户家目录
- 登录shell (nologin表示不可登录)

### shadown 记录

- 用户名
- 密码(!!表示空密码) 组成：$加密类型$盐$加密密码

### group 记录

组名:组密码:组id

### 创建用户

`useradd username`

1. 在/etc/passwd 中添加用户信息
2. 在/etc/shadown 中添加密码信息(passwd 创建密码)
3. 创建家目录
4. 将/etc/skel 中的文件复制到用户家目录
5. 建立一个用户同名组

useradd 参数

- -d 家目录
- -s 登录shell
- -u userid
- -g groutid
- -G 附属组id

可以通过修改/etc/passwd

### 修改用户信息

`usermod 参数 username`

- -l 新用户名
- -u 新userid
- -d 家目录位置
- -g 所属主组
- -G 所属附属组
- -L 锁定用户
- -U 解锁用户

### userdel 删除用户

`userdel username`

### 创建密码

`passwd username`

## 组

根据职能组织组

- 组id
- /etc/group
- 用户拥有一个主组

- `groupadd groupname` 创建
- `groupmod groupname` 修改
- `groupdel groupname` 删除

- chmod 更改文件权限
- chown 更改文件所属

## 普通用户root权限

`/etc/sudoers` 文件添加

`%groupname ALL=(ALL) ALL` 组用户具有临时root权限

`username ALL=(ALL) ALL` 用户具有临时root权限