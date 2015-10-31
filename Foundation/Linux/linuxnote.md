# How to use Linux#

## 1.1基本命令##

安装:**sudo apt-get install xxx-yyy** ,其中xxx为软件名，yyy为版本号 

显示日期时间：**date**

显示日历：**cal**

简单计算器：**bc**

输入man [命令]，可查看帮助

**whatis [命令或数据]** 等价于 **man -f [命令或数据]**

**apropos [命令或数据]** 等价于 **man -k [命令或数据]**

**info info**:在线帮助 

**usr/share/doc**

**who**:查看谁在线

**netstat -a**:查看联网情况

**sync**:数据同步写入磁盘

**reboot,halt,poweroff**：重新启动，关机

**init**：切换运行等级

- run level 0:关机
- run level 3：纯文本模式
- run level 5:含有图形接口模式
- run level 6:重新启动

**passwd**:修改密码
 
权限：分root，user,group,others

- **/etc/passwd**：账号信息
- **/etc/shadow**：密码信息
- **/etc/group**：群组信息

## 2.2重要热键
**Tab**:接在一串命令的第一个字的后面，则为命令补全；若接在一串命令的第二个字以后时，则为文件补齐！输入$后，敲两下Tab键，可查看所有的命令

**Ctrl+C**：中断目前程序

**Ctrl+d**:键盘输入结束或Exit



