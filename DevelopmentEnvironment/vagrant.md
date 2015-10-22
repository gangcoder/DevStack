# Vagrant

更新时间 2015/10/21

构建虚拟开发环境的工具

## 安装

### 下载安装软件

1. [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
2. [Vagrant](http://downloads.vagrantup.com/ )
3. [系统镜像](http://www.vagrantbox.es/)

### 初始化环境

1. 添加镜像 `$ vagrant box add boxname ~/box/precise64.box`
1. 切换工作目录 `cd ~/dev`
1. 初始化环境 `vagrant init boxname`
1. 启动环境 `vagrant up`
1. 登录环境 `vagrant ssh`

宿主机的 `~/dev` 对应虚拟机的 `/home/vagrant`

## 配置

### 网络设置

配置host-only模式

`config.vm.network :private_network, ip: "192.168.33.10"`

### 打包分发

对配置好的环境进行打包, 用于环境分发

`$ vagrant package`

## 其他命令

### 常用命令

```
$ vagrant init  # 初始化
$ vagrant up  # 启动虚拟机
$ vagrant halt  # 关闭虚拟机
$ vagrant reload  # 重启虚拟机
$ vagrant ssh  # SSH 至虚拟机
$ vagrant status  # 查看虚拟机运行状态
$ vagrant destroy  # 销毁当前虚拟机
```

### 帮助命令

`vagrant COMMAND -H`


## 常见问题

### 静态文件修改后页面刷新不显示最新文件

存在缓存文件,通过配置Apache/Nginx 文件解决

```
# Apache 配置添加:
EnableSendfile off

# Nginx 配置添加:
sendfile off;
```

## 参考资料

- [官方文档](http://docs.vagrantup.com/v2/cli/index.html)