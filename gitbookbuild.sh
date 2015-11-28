#!/bin/bash
echo 'build gitbook start...'
gitbook build
echo 'copy static html to githuo.io...'
cp -u -r _book/* /home/iron/Git/ironxu.github.io 
echo 'copy done'
#cd /home/iron/Git/ironxu.github.io
#echo 'in blog'
#git add -A
