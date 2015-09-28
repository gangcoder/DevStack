#!/bin/bash

name='John' #or declare name='Docn' 定义局部变量
export NAME='Don' #定义全局变量
echo "$name""$NAME" #双引号内 $ 引用名称对应内容

read commit
echo "$commit"
