#!/bin/sh

if [ -z "$ROOT" ]; then
	ROOT=`php -r "echo dirname(dirname(dirname(realpath('$(pwd)/$0'))));"`
	export ROOT
fi

$ROOT/app/console doctrine:database:create
$ROOT/app/console doctrine:schema:create
$ROOT/app/console doctrine:fixtures:load
$ROOT/app/console cache:clear