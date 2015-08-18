# Linux

## 基本操作

- 解压: `tar zxf Achieve.tar.gz`
- 压缩: `tar -cf project.tar project `
- 生成补丁: `diff a b > c`
- 应用补丁: `patch a < c`

### Crontab

crontab可以定时去执行你要做的动作

- crontab -u //设定某个用户的cron服务，一般root用户在执行这个命令的时候需要此参数
- crontab -l //列出某个用户cron服务的详细内容
- crontab -r //删除某个用户的cron服务
- crontab -e //编辑某个用户的cron服务

crontab内的基本编辑格式如下

>\*　\*　\*　\*　\*　　command
>
>分　 时　 日　 月　周　  命令

- 第1列表示分钟1～59 每分钟用*或者 */1表示
- 第2列表示小时1～23（0表示0点）
- 第3列表示日期1～31
- 第4列表示月份1～12
- 第5列标识号星期0～6（0表示星期天）
- 第6列要运行的命令

**时间表示**

- \*:    每次都执行
- \*/n:  每n长时间单位执行一次
- T1-T2: T1,T2时间段内执行
- a,b,c: 当某时间时执行

**目录**

- /etc/crontab 系统运行的的调度程序
- /var/spool/cron 用户生成的crontab
- /etc/cron.deny 表示不能使用crontab 命令的用户
- /etc/cron.allow 表示能使用crontab的用户。

默认情况下，cron.allow文件不存在。如果两个文件同时存在，那么/etc/cron.allow 优先。
如果两个文件都不存在，那么只有超级用户可以安排作业.

**示例**

```
0,30 18-23 * * * /etc/init.d/smb restart
上面的例子表示在每天18 : 00至23 : 00之间每隔30分钟重启smb 。
```

**注意事项**

- 在SHELL中设置了必要的环境变量；例如一个shell脚本手工执行OK，但是配置成后台作业执行时，获取不到ORACLE的环境变量，这是因为crontab环境变量问题，Crontab的环境默认情况下并不包含系统中当前用户的环境。所以，你需要在shell脚本中添加必要的环境变量的设置
- 尽量所有的文件都采用完全路径方式，避免使用相对路径。
- 新创建的cron job，不会马上执行，至少要过2分钟才执行。如果重启cron则马上执行。
- 每条 JOB 执行完毕之后，系统会自动将输出发送邮件给当前系统用户。日积月累，非常的多，甚至会撑爆整个系统。所以每条 JOB 命令后面进行重定向处理是非常必要的： >/dev/null 2>&1 。前提是对 Job 中的命令需要正常输出已经作了一定的处理, 比如追加到某个特定日志文件。
- 当crontab突然失效时，可以尝试/etc/init.d/crond restart解决问题。或者查看日志看某个job有没有执行/报错tail -f /var/log/cron。
- 千万别乱运行crontab -r。它从Crontab目录（/var/spool/cron）中删除用户的Crontab文件。删除了该用户的所有crontab都没了。
- 在crontab中%是有特殊含义的，表示换行的意思。如果要用的话必须进行转义\%，如经常用的date ‘+%Y%m%d’在crontab里是不会执行的，应该换成date ‘+'%Y\%m\%d’`'
`

**系统级任务调度与用户级任务调度**

系统级任务调度主要完成系统的一些维护操作，用户级任务调度主要完成用户自定义的一些任务，
可以将用户级任务调度放到系统级任务调度来完成（不建议这么做），但是反过来却不行，
root用户的任务调度操作可以通过“crontab –uroot –e”来设置，也可以将调度任务直接写入/etc/crontab文件，需要
注意的是，如果要定义一个定时重启系统的任务，就必须将任务放到/etc/crontab文件，
即使在root用户下创建一个定时重启系统的任务也是无效的。

**关于 >/dev/null 2>&1 的解释**

- 0表示键盘输入
- 1表示标准输出
- 2表示错误输出.

```
* * * * * /home/oracle/test.sh >/home/oracle/log.txt & 默认值为1，即和下面命令一致
* * * * * /home/oracle/test.sh 1>/home/oracle/log.txt &
* * * * * /home/oracle/test.sh 2>/home/oracle/log.txt &
* * * * * /home/oracle/test.sh 2>/home/oracle/log.txt 2>&1 &
```

* 1,2将tesh.sh 命令输出重定向到log.txt, 即输出内容不打印到屏幕上，而是输出到log.txt文件中。如果你需要追加而不是覆盖，可以用 >>代替>
* 2>&1 是将错误输出重定向到标准输出。 然后将标准输入重定向到文件log.txt。
* &1 表示的是文件描述1，表示标准输出，如果这里少了&就成了数字1，就表示重定向到文件1。

**修改crontab环境变量**

- 脚本中涉及文件路径时写全局路径；
- 脚本执行要用到java或其他环境变量时，通过source命令引入环境变量，如：

```
#!/bin/sh
source /etc/profile
export RUN_CONF=/home/d139/conf/platform/cbp/cbp_jboss.conf
/usr/local/jboss-4.0.5/bin/run.sh -c mev &
```

- 当手动执行脚本OK，但是crontab死活不执行时。这时必须大胆怀疑是环境变量惹的祸，并可以尝试在crontab中直接引入环境变量解决问题。如：
```
0 * * * * . /etc/profile;/bin/sh /var/www/java/audit_no_count/bin/restart_audit.sh
```

[http://www.app365.com/jforum/posts/list/195.page;jsessionid=EC05A951CCA188F7063D5B2365C994C2#p295](http://www.app365.com/jforum/posts/list/195.page;jsessionid=EC05A951CCA188F7063D5B2365C994C2#p295)
[http://blog.csdn.net/dancen/article/details/24355287](http://blog.csdn.net/dancen/article/details/24355287)
[http://www.cnblogs.com/SuperXJ/archive/2012/03/16/2399856.html](http://www.cnblogs.com/SuperXJ/archive/2012/03/16/2399856.html)

### 环境变量

[参见](http://www.powerxing.com/linux-environment-variable/)
