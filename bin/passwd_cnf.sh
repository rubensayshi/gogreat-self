#!/bin/sh

DIR=`php -r "echo dirname(dirname(realpath('$0')));"`
CNF="$DIR/cnf"
PASSWD_DIR="$CNF/passwd"

if [ "$1" = "--reinstall" -o "$2" = "--reinstall" ]; then
    rm -rf $PASSWD_DIR
fi

if [ ! -d $PASSWD_DIR ]; then
	mkdir -p "$PASSWD_DIR"
	git clone git@saiko.unfuddle.com:saiko/self.git $PASSWD_DIR
fi

if [ -d $PASSWD_DIR ]; then
	cd "$PASSWD_DIR"
	git fetch origin
	git reset --hard origin/HEAD
fi
