#!/bin/sh

DIR=`php -r "echo dirname(dirname(realpath('$0')));"`
CNF="$DIR/cnf"
VERSION=`cat "$DIR/VERSION"`

# initialization
if [ "$1" = "--reinstall" -o "$2" = "--reinstall" ]; then
    rm -rf $CNF
fi

mkdir -p "$CNF" && cd "$CNF"

##
# @param destination directory (e.g. "doctrine")
# @param URL of the git remote (e.g. https://github.com/doctrine/doctrine2.git)
# @param revision to point the head (e.g. origin/HEAD)
#
install_git()
{
    INSTALL_DIR=$1
    SOURCE_URL=$2
    REV=$3

    echo "> Installing/Updating " $INSTALL_DIR

    if [ -z $REV ]; then
        REV=origin/HEAD
    fi

    if [ ! -d $INSTALL_DIR ]; then
        git clone $CLONE_OPTIONS $SOURCE_URL $INSTALL_DIR
    fi

    cd $INSTALL_DIR
    git fetch origin
    git reset --hard $REV
    cd ..
}

# Assetic
mkdir passwd
install_git passwd git://git@saiko.unfuddle.com:saiko/self.git origin/master
