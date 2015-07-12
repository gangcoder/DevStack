# Development Environment

## 操作系统

Linuxmint

### Window + Virtual Box实现

```
VBoxManage startvm AMP -type headless //后台运行虚拟机
echo VBox having start...
SET /P Enter="Input Yes" //暂停cmd
//获取后台运行虚拟机IP
vboxmanage guestproperty get AMP /VirtualBox/GuestInfo/Net/0/V4/IP
SET /P Enter="Input Yes"
VBoxManage controlvm AMP acpipowerbutton //后台关闭虚拟机
```

VirtualBox 网络选择桥接模式

xshell 连接虚拟机

vsftp 进行文件传输

##  编辑器环境

tmux 进行多窗口管理

vim 进行代码编辑

## Git

代码管理
