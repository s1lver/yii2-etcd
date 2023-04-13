#!/bin/sh

set -eu

flock runtime/composer-install.lock composer update --prefer-dist --no-interaction

php --version
set -x
exec "$@"