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

