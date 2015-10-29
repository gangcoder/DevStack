DevStack

开发技术体系栈

从gh-pages 获取文件到当前分子 `_book` 目录下

`git read-tree --prefix=_book/ -u gh-pages`

从master分支子目录`_book`获取内容合并到当前分支

`git read-tree -m -u master:_book`

[1](http://www.worldhello.net/2010/10/31/2041.html)
[2](https://help.github.com/articles/about-git-subtree-merges/)
[3](http://www.cnblogs.com/Mingxx/archive/2013/03/13/2957483.html)
