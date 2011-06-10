#!/bin/sh

if [ -z "$SUDO_DO" ]; then
	SUDO_DO="sudo -u www-data "
	export SUDO_DO
fi

if [ -z "$ROOT" ]; then
	ROOT=`php -r "echo dirname(dirname(dirname(realpath('$(pwd)/$0'))));"`
	export ROOT
fi

${SUDO_DO}chmod -R 0777 $ROOT/app/cache $ROOT/app/logs
${SUDO_DO}chown -R www-data:www-data $ROOT/app/cache $ROOT/app/logs