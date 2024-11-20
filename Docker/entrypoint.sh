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

SEEDER_CHECK=$(php -r "
require 'vendor/autoload.php';
\$count = \App\Models\Post::count();
echo \$count === 0 ? 'run' : 'skip';
")

if [ "$SEEDER_CHECK" == "run" ]; then
    echo "Running seeders..."
    php artisan db:seed --force
else
    echo "Seeders skipped, data already exists."
fi
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
