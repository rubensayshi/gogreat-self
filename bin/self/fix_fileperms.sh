#!/bin/sh

SUDO_DO="sudo -u root "

if [ -z "$ROOT" ]; then
	ROOT=`php -r "echo dirname(dirname(dirname(realpath('$(pwd)/$0'))));"`
	export ROOT
fi

${SUDO_DO}chmod -R 0770 $ROOT
${SUDO_DO}chown -R www-data:www-data $ROOT
