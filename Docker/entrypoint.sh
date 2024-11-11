#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env locahost"
    cp .env.example .env
else
    echo "Env file already exists"
fi

php artisan key:generate
php artisan migrate --force
# php artisan db:seed --force
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
