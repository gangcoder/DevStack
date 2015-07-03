#!/bin/bash
echo 'build gitbook start...'

gitbook build

echo 'copy static html to githuo.io...'

cp -u -r _book/* /home/vagrant/git/hubeixugang.github.io

echo 'copy done'
