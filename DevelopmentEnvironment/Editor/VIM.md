# VIM

vim 快捷键整理搜集

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

#### Movement by screensi

| 命令      | 解释             | 命令   | 解释                |
|-----------|------------------|--------|---------------------|
| ^ + f     | 下移一页         | ^ + b  | 上移一页            |
| ^ + d     | 下移半页         | ^ + u  | 上移半页            |
| ^ + y     | 下移一行         | ^ + e  | 上移一行            |
| zt[Enter] | 移动到屏幕顶部   | zz[.]  | 移动到屏幕中间      |
| zb[-]     | 移动到屏幕底部   | nzz    | 第n行移动到屏幕中间 |
| H         | 移到屏幕顶部的行 | M      | 移到屏幕中间的行    |
| L         | 移到屏幕底部的行 | nH     | 移到顶部下n行       |
| nL        | 移到底部上n行    | nEnter | 下移n行             |
| +         | 下移一行         | -      | 上移一行            |
| ^         | 第一个非空格处   | n\     | 移动到当前行的n列   |
| n <space> | 右移n 个字符     |

#### Movement by text blocksi

| 命令 | 解释               | 命令 | 解释               |
|------|--------------------|------|--------------------|
| w    | 移到下一个单词开头 | b    | 移到上一个单词开头 |
| e    | 移到单词结尾       | (    | 移到当前句子开头   |
| )    | 下一行句子开头     | {    | 这一段的开头       |
| }    | 下一段的开头       | [[   | 这一节的开头       |
| ]]   | 下一节的开头       | ge [gE] | 移到上一个单词  |

#### Movement by searches for patternsi

| 命令       | 解释                      | 命令       | 解释           |
|------------|---------------------------|------------|----------------|
| /          | 往前搜索                  | ?          | 往回搜索       |
| n [/Enter] | 往前重复搜索              | N [?Enter] | 往回重复搜索   |
| d/c        | 搜索c字符并删除前面的内容 | fx         | 向后搜索x      |
| Fx         | 向前搜索x                 | tx         | 向后搜索x      |
| Tx         | 向前搜索x                 | ;          | 重复上一次搜索 |
| ,          | 重复搜索，方向相反        |

set nowrapscan 控制搜索是否可以绕回开头

#### Movement by line numberi

| 命令 | 解释           | 命令 | 解释           |
|------|----------------|------|----------------|
| G    | 文件底部       | gg   | 文件首行       |
| nG   | 移到n行        | \`\` | 返回上一个位置 |
| ''   | 返回上一个位置 |

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
