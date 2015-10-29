# Vim配色

## 基础

用户自定义主题 `~/.vim/colors` 以*.vim命名

切换主题 `:colorscheme 主题插件名称`

在~/.vimrc 中开启

```
" 256颜色支持
set t_Co = 256
" 语法高亮
syntax enable
syntax on
```

## 定制主题

### 主题色调

存在两种色调 dark/light

`set background = dark`

重新设置语法高亮

```
if version > 580  
    hi clear  
    if exists("syntax_on")  
        syntax reset  
    endif  
endif
```

主题名称

`let g:colors_name = "themename"`

### 基础属性

vim可以在黑白终端、彩色终端、GUI界面下运行，所以需要对其分贝进行配置

- term 黑白终端的属性  
- cterm 彩色终端的属性  
- ctermfg 彩色终端前景色  
- ctermbg 彩色终端背景色  
- gui GUI属性  
- guifg GUI前景色  
- guibg GUI背景色 

以彩色终端为例

### VIM安全色

- Black    
- DarkBlue    
- DarkGreen          
- DarkCyan   
- DarkRed  
- DarkMagenta          
- Brown, DarkYellow              
- LightGray, LightGrey, Gray, Grey                     
- DarkGray, DarkGrey     
- Blue, LightBlue       
- Green, LightGreen            
- Cyan, LightCyan                      
- Red, LightRed                           
- Magenta, LightMagenta   
- Yellow, LightYellow     
- White  

### 配色语法

`hi Type ctermfg = LightYellow ctermbg = Black cterm = bold`

- hi是 highlight命令的缩写，用于高亮配置
- Type是要配色的元素名称
- 参数采用的是 Key=Value的形式

### 元素列表

**状态栏**

- hi StatusLine   状态栏  
- hi StatusLineNC 非当前窗口的状态栏  
- ErrorMsg        错误信息  
- WarningMsg      警告信息  
- ModeMsg         当前模式  
- MoreMsg         其他文本  
- Question        询问用户  
- Error           错误  

**文本搜索**

- Pmenu           弹出菜单  
- PmenuSel        菜单当前选择项  

**窗体边框相关**

- VertSplit       垂直分割窗口的边框  
- LineNr          行号  
- Cursor          光标所在字符  
- CursorLine      光标所在行  
- ColorColumn     光标所在列  
- ColorColumn     标尺  
- NonText         窗口尾部的~和@，以及文本里实际不显示的字符  

**diff模式**

- DiffAdd         diff模式增加的行  
- DiffChange      diff模式改变的行  
- DiffDelete      diff模式删除的行  
- DiffText        diff模式插入文本  

**语法**

- Comment         注释  
- PreProc         预处理  
- Type            数据类型  
- Constant        常量  
- Statement       控制语句  
- Special         字符串中的中的特殊字符  
- String          字符串  
- cCppString      Cpp字符串  
- Number          数字  
- Todo            TODO、HACK、FIXME等标签  

## 示例

```
set background=dark  
if version > 580  
    hi clear  
    if exists("syntax_on")  
        syntax reset  
    endif  
endif  
let g:colors_name="themename"  
hi Normal               ctermfg=Grey            ctermbg=Black         
hi ColorColumn          ctermfg=White           ctermbg=Grey  
                                               ·  
hi ErrorMsg             term=standout             
hi ErrorMsg             ctermfg=LightBlue       ctermbg=DarkBlue      
hi WarningMsg           term=standout             
hi WarningMsg           ctermfg=LightBlue       ctermbg=DarkBlue      
hi ModeMsg              term=bold               cterm=bold            
hi ModeMsg              ctermfg=LightBlue       ctermbg=Black         
hi MoreMsg              term=bold               ctermfg=LightGreen    
hi MoreMsg              ctermfg=LightBlue       ctermbg=Black         
hi Question             term=standout           gui=bold  
hi Question             ctermfg=LightBlue       ctermbg=Black         
hi Error                term=bold               cterm=bold            
hi Error                ctermfg=LightBlue       ctermbg=Black         
                                               ·  
hi LineNr               ctermfg=LightBlue       ctermbg=Black         
hi CursorColumn         ctermfg=White           ctermbg=Grey          
hi CursorLine           ctermfg=LightBlue       ctermbg=Black         
hi ColorColumn          ctermfg=White           ctermbg=Grey          
                                               ·  
hi IncSearch            ctermfg=Black           ctermbg=DarkGrey      
hi Search               ctermfg=Black           ctermbg=DarkGrey      
hi StatusLine           term=bold               cterm=bold            
hi StatusLine           ctermfg=Black           ctermbg=Grey          
hi StatusLineNC         term=bold               cterm=bold            
hi StatusLineNC         ctermfg=Black           ctermbg=Grey          
                                               ·  
hi VertSplit            ctermfg=Grey            ctermbg=Grey          
hi Visual               term=bold               cterm=bold            
hi Visual               ctermfg=Black           ctermbg=Grey          
                                               ·  
highlight Pmenu         ctermfg=Black           ctermbg=Grey        
highlight PmenuSel      ctermfg=LightBlue       ctermbg=DarkBlue    
            ·  
hi Comment              ctermfg=DarkCyan        ctermbg=Black  
hi PreProc              ctermfg=Blue            ctermbg=Black  
hi Type                 ctermfg=LightYellow     ctermbg=Black           cterm=bold  
hi Constant             ctermfg=Blue            ctermbg=Black           cterm=bold  
hi Statement            ctermfg=LightYellow     ctermbg=Black           cterm=bold  
hi Special              ctermfg=Red             ctermbg=Black           cterm=bold  
hi SpecialKey           ctermfg=Red             ctermbg=Black           cterm=bold  
hi Number               ctermfg=Blue            ctermbg=Black  
hi cCppString           ctermfg=Red             ctermbg=Black  
hi String               ctermfg=Red             ctermbg=Black  
hi Identifier           ctermfg=Red             ctermbg=Black           cterm=bold  
hi Todo                 ctermfg=Black           ctermbg=Gray            cterm=bold  
hi NonText              ctermfg=LightBlue       ctermbg=Black  
hi Directory            ctermfg=Blue            ctermbg=Black  
hi Folded               ctermfg=DarkBlue        ctermbg=Black           cterm=bold  
hi FoldColumn           ctermfg=LightBlue       ctermbg=Black  
hi Underlined           ctermfg=LightBlue       ctermbg=Black           cterm=underline  
hi Title                ctermfg=LightBlue       ctermbg=Black  
hi Ignore               ctermfg=LightBlue       ctermbg=Black  
hi Directory            ctermfg=LightBlue       ctermbg=Black  
hi browseSynopsis       ctermfg=LightBlue       ctermbg=Black  
hi browseCurDir         ctermfg=LightBlue       ctermbg=Black  
hi favoriteDirectory    ctermfg=LightBlue       ctermbg=Black  
hi browseDirectory      ctermfg=LightBlue       ctermbg=Black  
hi browseSuffixInfo     ctermfg=LightBlue       ctermbg=Black  
hi browseSortBy         ctermfg=LightBlue       ctermbg=Black  
hi browseFilter         ctermfg=LightBlue       ctermbg=Black  
hi browseFiletime       ctermfg=LightBlue       ctermbg=Black  
hi browseSuffixes       ctermfg=LightBlue       ctermbg=Black  
hi TagListComment       ctermfg=LightBlue       ctermbg=Black  
hi TagListFileName      ctermfg=LightBlue       ctermbg=Black  
hi TagListTitle         ctermfg=LightBlue       ctermbg=Black  
hi TagListTagScope      ctermfg=LightBlue       ctermbg=Black  
hi TagListTagName       ctermfg=LightBlue       ctermbg=Black  
hi Tag                  ctermfg=LightBlue       ctermbg=Black  
```
**参考**

- [http://blog.csdn.net/mdl13412/article/details/8129904](http://blog.csdn.net/mdl13412/article/details/8129904)
- [http://blog.csdn.net/MDL13412](http://blog.csdn.net/MDL13412)