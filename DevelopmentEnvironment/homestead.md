# homestead

Laravel Homestead是一个官方预封装的Vagrant“箱子”

内置 Nginx、PHP 5.6、MySQL、Postgres、Redis、Memcached 等常用软件

## 安装

安装VirtualBox 和 Vagrant

### 添加 `laravel/homestead` 盒子

`vagrant box add laravel/homestead`

### 克隆 homestead 配置

git 克隆

`git clone https://github.com/laravel/homestead.git Homestead `

composer 安装方式

`composer global require "laravel/homestead=~2.0"`

`~/.composer/vendor/bin` 目录添加到 PATH 环境变量中后，可执行`homestead`

### 编辑Homestead.yaml配置文件

生成 Homestead.yaml 配置文件

homestead方式 `homestead init`

shell方式 `bash init.sh`

编辑 Homestead.yaml

homestead方式 `homestead edit`

直接编辑 `vim ~/.homestead/Homestead.yaml`

## 配置与操作

### 配置详解

```
ip: "192.168.10.10"
memory: 512
cpus: 1
provider: virtualbox # 需要使用的 Vagrant prodiver：virtualbox还是vmware_fusion

authorize: ~/.ssh/id_rsa.pub # 公钥路径

keys:
    - ~/.ssh/id_rsa # 秘钥路径

folders: # 共享目录
    - map: ~/Code
      to: /home/vagrant/Code

sites: # 配置站点
    - map: homestead.app
      to: /home/vagrant/Code/Laravel/public

databases:
    - homestead

variables:
    - key: 'APP_ENV'
      value: 'local'
    - key: 'APP_DEBUG'
      value: 'true'

# blackfire: # Blackfire Profiler分析工具
#     - id: foo
#       token: bar
#       client-id: foo
#       client-token: bar

# ports: # 自定义端口转发
#     - send: 93000
#       to: 9300
#     - send: 7777
#       to: 777
#       protocol: udp

```

### 虚拟机操作

`Homestead` 目录下

1. 开机： vagrant up
1. 关机： vagrant halt 
1. 销毁： vagrant destroy --force
2. 登录:  vagrant ssh

### 访问网站

1. 绑定hosts `192.168.10.10    homestead.app`
2. 访问 `http://homestead.app`

## 登录

### SSH登录

1. 通过ssh登录 `ssh vagrant@127.0.0.1 -p 2222`

或者创建别名 `alias vm="ssh vagrant@127.0.0.1 -p 2222"`，使用vm登录

2. 通过在Homestead 目录使用 vagrant ssh 命令

### 连接虚拟机内Mysql

`mysql -h 127.0.0.1:33060 -u homestead -p secret`

### 端口映射

- SSH: 2222 → Forwards To 22
- HTTP: 8000 → Forwards To 80
- HTTPS: 44300 → Forwards To 443
- MySQL: 33060 → Forwards To 3306
- Postgres: 54320 → Forwards To 5432

**增加额外端口**

```
ports:
    - send: 93000
      to: 9300
    - send: 7777
      to: 777
      protocol: udp
```

### 增加站点

方式一

1. Homestead.yaml 文件中增加站点
1. Homestead 目录中执行 vagrant provision

会破坏以后数据库

方式二 Homestead环境中的 ` serve` 命令

1. SSH 进入 Homestead 环境中
1. 执行下列命令`serve domain.app /home/vagrant/Code/path/to/public/directory 80`



**参考资料**

- [Laravel Homestead](http://laravel-china.org/docs/5.0/homestead)
- [blackfire](https://blackfire.io/)
- [NFS](http://docs.vagrantup.com/v2/synced-folders/nfs.html)