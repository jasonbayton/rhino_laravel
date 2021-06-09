#!/bin/sh

git pull
composer install --no-interaction --no-dev --prefer-dist --no-interaction

php artisan sitemap:generate
