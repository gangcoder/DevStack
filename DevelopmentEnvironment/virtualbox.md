# virtualbox

查看有哪些虚拟机
VBoxManage list vms
查看虚拟的详细信息
VBoxManage list vms --long
查看运行着的虚拟机
VBoxManage list runningvms
开启虚拟机在后台运行
VBoxManage startvm -type headless
开启虚拟机并开启远程桌面连接的支持
VBoxManage startvm -type vrdp
改变虚拟机的远程连接端口,用于多个vbox虚拟机同时运行
VBoxManage controlvm vrdpprot
关闭虚拟机
VBoxManage controlvm <box-name> acpipowerbutton
强制关闭虚拟机
VBoxManage controlvm poweroff
获取虚拟机IP
vboxmanage guestproperty get AMP /VirtualBox/GuestInfo/Net/0/V4/IP

显示虚拟机所有信息
vboxmanage guestproperty enumerate AMP

新建一个批处理文件(.bat文件)。 写上一句代码就可以了：
VBoxManage startvm VBoxName -type headless 把路路径和虚拟机名改成自己的就可以了