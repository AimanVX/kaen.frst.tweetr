#!/usr/bin/env bash
set -e

php artisan config:clear || true
php artisan cache:clear || true


sed -i "s/Listen 80/Listen ${PORT:-8080}/" /etc/apache2/ports.conf || true
sed -i "s/:80>/:${PORT:-8080}>/" /etc/apache2/sites-available/000-default.conf || true

php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true
php artisan migrate --force || true

apache2-foreground
