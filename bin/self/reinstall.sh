#!/bin/sh

if [ -z "$SUDO_DO" ]; then
	SUDO_DO="sudo -u www-data "
	export SUDO_DO
fi

if [ -z "$ROOT" ]; then
	ROOT=`php -r "echo dirname(dirname(dirname(realpath('$(pwd)/$0'))));"`
	export ROOT
fi

$ROOT/bin/self/destroy.sh
$ROOT/bin/self/install.sh