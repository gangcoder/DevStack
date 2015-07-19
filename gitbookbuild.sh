#!/bin/bash
read commit
git add -A
git commit -m "$commit"
echo 'build gitbook start...'
gitbook build
echo 'copy static html to githuo.io...'
cp -u -r _book/* /home/vagrant/git/hubeixugang.github.io
echo 'copy done'
cd /home/vagrant/git/hubeixugang.github.io
git add -A
git commit -m "$commit"
git push origin master
cd /home/vagrant/git/Accumulate
echo 'push done'
