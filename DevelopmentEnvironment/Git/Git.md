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
git log --graph --pretty=oneline --abbrev-commit 查看分支情况
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

### 添加远程仓库

`git remote add origin git_url` 关联远程库

`git clone git_url` 克隆远程仓库

### 推送

`git push -u origin master`

-u 在远程和本地分支间建立联系,第一次建立即可

### 抓取分支

`git checkout -b dev origin/dev` 通过远程分支创建本地分支

`git branch --set-upstream dev origin/dev` 建立本地分支与远程分支的联系

## 分支

### 创建分支

`git checkout -b dev` 创建并切换分支

```
git branch dev
git checkout dev
```

`git branch -d <name>` 删除分支

`git branch -D <name>` 删除未合并分支

### 分支合并

`git merge dev` 合并dev 到当前分支

`git merge --no-ff -m 'merge with no-ff' dev` 合并时禁用 Fast Forward

### Bug 分支

```
git stash 保存并清空工作区
git stash list 列出被保存的工作区
git stash apply 恢复保存的工作区
git stash drop 删除保存的工作区
git stash pop 弹出保存的工作区
git stash apply stash@{0} 恢复指定的工作区
```

修复Bug：创建Bug分支，修复再合并。当现场有工作时，可以使用 git stash 保存

## 标签

### 创建标签

`git tag <name>` 用于新建一个标签，默认为HEAD，也可以指定一个commit id

`git tag -a <tagname> -m "introduce"` 指定标签信息

`git tag -s <tagname> -m "introduce"` PGP签名

`git tag` 查看所有标签

`git show tagname` 显示标签详细信息

### 标签操作

`git tag -d v0.1` 删除标签

`git push origin <tagname>` 推送标签到远程

`git push origin --tags` 推送所有标签到远程

### 删除远程标签

`git tag -d v0.9` 先删除本地标签

`git push origin :refs/tags/v0.9` 删除远程分支

## GitHub

## 自定义

`git config --global color.ui true`

### .gitignore

[github ignore](https://github.com/github/gitignore)

忽略文件原则：
- 自动生成文件
- 中间件
- 敏感信息

### 别名

```
git config --global alias.st status
git config --global alias.co checkout
git config --global alias.ci commit
git config --global alias.br branch
git config --global alias.unstage 'reset HEAD'
git config --global alias.last 'log -1'
git config --global alias.lg "log --color --graph --pretty=format:'%Cred%h%Creset -%C(yellow)%d%Creset %s %Cgreen(%cr) %C(bold blue)<%an>%Creset' --abbrev-commit"
```

global 配置文件 ~/.gitconfig
