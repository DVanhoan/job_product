#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

# if [ ! -f ".env" ]; then
#     echo "Creating env file for env ${APP_ENV}"
#     cp .env.example .env
# else
#     echo "Env file already exists"
# fi

# until nc -z -v -w30 "${DB_HOST:-database}" 3306
# do
#   echo "Waiting for database connection..."
#   sleep 1
# done

# echo "Database is up, proceeding with Laravel setup..."


php artisan key:generate
php artisan migrate --force
php artisan cache:clear
php artisan config:clear
php artisan route:clear

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
