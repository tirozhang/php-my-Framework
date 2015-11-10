#!/bin/sh
cd ..
git add .
git commit -am "$1" 
git push origin master 
