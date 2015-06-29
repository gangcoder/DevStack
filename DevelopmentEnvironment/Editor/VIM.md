# VIM

## 插件

### plugin lists

- [pathogen 插件管理插件](https://github.com/tpope/vim-pathogen)
- [NERDTree 目录结构](https://github.com/scrooloose/nerdtree)
- [Command-T 文件跳转](https://github.com/wincent/Command-T.git) (http://www.justinbar.net/post/install-vim-with-ruby-support-and-command-t-plugin-on-ubuntu)
- [Powerline 状态栏](https://github.com/Lokaltog/vim-powerline)
- [vim-snipmate 代码片段](https://github.com/garbas/vim-snipmate)
- [visualmark 标记](http://www.vim.org/scripts/download_script.php?src_id=4700)
- [taglist 代码结构](https://github.com/vim-scripts/taglist.vim)
- [YouCompleteMe 补全](https://github.com/Valloric/YouCompleteMe#ubuntu-linux-x64-super-quick-installation)

### pathogen 插件安装

```
cd ~/.vim/bundle
git clone git_path_url
```

## 分屏

### 垂直分屏

`vim -On file1 file2...` 启动时分屏

`o` 是字母o

`n` 是数字，表示分成几屏

`ctrl+w v` 左右分隔当前打开的文件

`:vsp filename` 打开新文件，并左右分隔

### 水平

`vim -on file1 file2...` 启动时分屏

`ctrl+w s` 上下分隔，当前文件

`:sp filename` 打开新文件,上下分隔

### 关闭分屏

`ctrl+w c`
`ctrl+w q`

### 移动光标

`ctrl+w l [h][k][j][w]`

#### 移动分屏

`ctrl+W L[H][K][J]`

`ctrl+W =` 所有屏都有一样的高度

`ctrl+W +` 增加高度

`ctrl+W -` 减少高度

## 标签

`vim -p filename` 以多标签形式打开文件

### 标签操作

- tabnew filename 增加标签
- tabe filename 在新标签中打开文件
- tabc 关闭当前tab
- tabo 关闭其他所有tab
- tabs 查看所有打开的tab
- tabp 或gT 前一个
- tabn 或gt 后一个
- tabsplit 打开当前缓冲区文件
- tabf 搜索当前目录并打开
- tabdo <command> 多标签页命令

### 移动

- tabp 或gT 前一个
- tabn 或gt 后一个
- tabfirst 或tabr 移动到第一个标签
- tablast 移动到最后一个
- tabm[n] 移动到第n个标签

## 配置

- vim 默认只能打开10个标签页 `set tabpagemax=15`
- 标签页在窗口上方是否显示 `set showtabline=[1,2,3]
- `help tab-page-intro` 帮助

## 快捷命令

- `:n` 跳至下一个文件
- `:e#` 回到之前编辑文件
- `:Ex` 目录浏览
- `:Sex` 水平分隔窗口，并开启目录浏览器
- `:ls` 显示buffer情况
- `:shell` 不关闭vim的情况下切换至shell
- `:exit` 从shell回到vim
- ZZ 存储离开
- :r [filename] 读取文档
- :n1,n2 w [filename] 存储n1,n2间的内容为filename文档

## 基本操作

### 移动

- C + f 下移一页
- C + b 上移一页
- C + d 下移半页
- C + u 上移半页
- + 光标下移一列
- - 光标上移一列
- n <space> 右移n 个字符
- 0 [Home] 行首
- gg == 1G
- n <Enter> 下移n 行

- zt
- zz
- zb

- w [W]
- b [B]
- e [E]
- ge [gE]

### 复制粘贴

`[line]y[scope]` 复制

`p/P` 粘贴

### 大小写转换

`[line]gu[scope]` 转小写

`[line]gU[scope]` 转大写

scope 表示范围可能取值

- w,e 转换单词
- nw,ne 转换n个单词
- nG 转换光标到nG行
- 0, $ 转换光标到行首，行尾
- h,l 转换光标前后一个字母

line 表示转换当前光标下多少行

### 查找替换

- `/word`
- `?word` 向上查找

- `n1,n2s/word/replace/g` 替换n1 到n2 行之间的word 为replace
- `1,$s/word/replace/gc` 确认并替换整篇文件的word 为replace
