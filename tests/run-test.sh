#!/bin/sh

DIR=`pwd`/`dirname $0`

cd $DIR/..
composer install

$DIR/../vendor/bin/tester -p php -c "$DIR/php.ini" "$DIR/src"
