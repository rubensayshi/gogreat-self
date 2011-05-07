#!/bin/sh

if [ -z "$ROOT" ]; then
	ROOT=`php -r "echo dirname(dirname(dirname(realpath('$(pwd)/$0'))));"`
	export ROOT
fi

chmod 0777 $ROOT/app/cache $ROOT/app/logs