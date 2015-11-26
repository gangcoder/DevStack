# SSH

SSH一种网络协议，用于计算机的加密登录，用避免被中途截获泄漏密码。

OpenSSH是 SSH的一种实现

## 基本用法

```
$ ssh -p 22 user@hostname
```

使用ssh连接远程机器的22号端口(默认端口)

## SSH协议过程

1. 远程主机收到用户的登录请求，把自己的公钥发给用户
1. 用户使用这个公钥，将登录密码加密后，发送回来
1. 远程主机用自己的私钥，解密登录密码，如果密码正确，就同意用户登录

**存在问题：中间人攻击**

如果有人截获了登录请求，然后冒充远程主机，将伪造的公钥发给用户，那么用户很难辨别真伪。

### 解决中间人问题

第一次登陆时提示

```
The authenticity of host 'host (12.18.429.21)' can't be established.
　　RSA key fingerprint is 98:2e:d7:e0:de:9f:ac:67:28:c2:42:2d:37:16:58:4d.
　　Are you sure you want to continue connecting (yes/no)?
```

用户自行确认该公钥指纹，将检验过的公钥保存在`/etc/ssh/ssh_known_hosts`

## 公钥登陆

用户将自己的公钥储存在远程主机上。登录的时候，远程主机会向用户发送一段随机字符串，用户用自己的私钥加密后，再发回来。远程主机用事先储存的公钥进行解密，如果成功，就证明用户是可信的，直接允许登录shell，不再要求密码

### 生成公秘钥对

`$ ssh-keygen`

公秘钥文件保存在 $HOME/.ssh/ 目录

### 上传公钥

`$ ssh-copy-id user@host`

### 无效时检查

远程服务器 `/etc/ssh/sshd_config` ，去掉注释

```
RSAAuthentication yes
PubkeyAuthentication yes
AuthorizedKeysFile .ssh/authorized_keys
```

重启远程主机 ssh服务 `service ssh restart`

## authorized_keys

用户的公钥，保存在远程主机登录后的用户主目录的$HOME/.ssh/authorized_keys文件中

公钥是authorized_keys文件末尾的一段字符串

```
$ ssh user@host 'mkdir -p .ssh && cat >> .ssh/authorized_keys' < ~/.ssh/id_rsa.pub
```

手动完成公钥写入


## 参考

- [阮一峰SSH登录](http://www.ruanyifeng.com/blog/2011/12/ssh_remote_login.html)