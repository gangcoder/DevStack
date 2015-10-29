# 子模块

## 增加子模块

`$ git submodule add git@github.com:hubeixugang/bash-study.git`

`git submodule add gitmodulesLink gitmodulesName`

产生 `.gitmodules` 文件

## 更新子模块

`$ git submodule update`

`$ git submodule update gittest` 更新指定子模块

## 删除子模块

`$ git rm -rf gittest` 

## 重建clone 子模块项目

```
$ git submodule init

$ git submodule update
```


- [6.6 Git 工具 - 子模块](http://git-scm.com/book/zh/v1/Git-%E5%B7%A5%E5%85%B7-%E5%AD%90%E6%A8%A1%E5%9D%97)
- [git 子模块学习笔记](http://github.tiankonguse.com/blog/2015/04/19/git-submodule-stydy/)