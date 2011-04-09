#!/bin/sh

DIR=`php -r "echo realpath(dirname(\\$_SERVER['argv'][0]));"`
cd $DIR

chmod 0777 app/cache app/logs