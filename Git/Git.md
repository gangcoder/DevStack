1 Git

## 初始化操作

### 初始化配置

```
git config --global user.name "Your name"
git config --global user.email "Your email"
```

### 初始化仓库

```
git init
git add
git commit -m 'comment'
```

### 状态与差异

```
git status
git diff
git diff HEAD -- filename 查看工作区和版本库里最新版本的区别
```

### 日志

```
git log --pretty=oneline 显示提交日志，不包括被回退
git reflog 显示提交历史
```

### 回退与撤销

```
git reset --hard HEAD^ HEAD表示当前版本，HEAD^^表示前2各版本 HEAD~100表示前100各版本
git reset --hard commit_id 回退到特定版本
```

`git checkout --filename`
撤销修改，如果暂存区没有该文件就从版本库提取文件

`git reset HEAD filename`
可以撤销暂存区的修改

### 文件删除与恢复

从版本库删除
```
git rm filename
git commit -m 'delete filename'
```

从版本库恢复
```
git checkout --filename
```

## 远程仓库

### SSH key

`ssh-keygen -t rsa -C 'example@server.com'` 生成ssh key

`ssh -T git@github.com` 测试ssh key添加成功
