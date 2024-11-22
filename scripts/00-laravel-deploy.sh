#!/usr/bin/env bash
echo "Running composer"
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

composer require fakerphp/faker

echo "Running migrations..."
php artisan migrate:fresh --force --seed

# echo "Running seeders..."
# php artisan db:seed