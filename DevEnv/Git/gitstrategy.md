# Git 使用策略

使用两种分支：公有，私有

公有：项目发布版本

私有：供自己开发使用

策略：私有版本进行开发，合并前清理commit


### 清理较少commit历史

```
git checkout master
git merge --squash private_feature_branch
git commit -v
```

合并修改，并重新编写commit 注释

### 清理较多commit历史

```
git rebase --interactive master
```

### 清理就有分支历史

```
git checkout master
git checkout -b cleaned_up_branch
git merge --squash private_feature_branch
git reset
```
