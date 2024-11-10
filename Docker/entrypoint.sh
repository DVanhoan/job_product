#!/bin/bash
# Echo các biến môi trường để kiểm tra
echo "APP_ENV: $APP_ENV" >> /tmp/deploy.log
echo "DB_CONNECTION: $DB_CONNECTION" >> /tmp/deploy.log
echo "DB_HOST: $DB_HOST" >> /tmp/deploy.log
echo "DB_DATABASE: $DB_DATABASE" >> /tmp/deploy.log
echo "DB_USERNAME: $DB_USERNAME" >> /tmp/deploy.log
echo "DB_PASSWORD: $DB_PASSWORD" >> /tmp/deploy.log
echo "DB_PORT: $DB_PORT" >> /tmp/deploy.log


if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

if [ ! -f ".env" ]; then
    echo "Creating env file for env ${APP_ENV}"
    cp .env.example .env
else
    echo "Env file already exists"
fi

# until nc -z -v -w30 "${DB_HOST:-database}" 3306
# do
#   echo "Waiting for database connection..."
#   sleep 1
# done

# echo "Database is up, proceeding with Laravel setup..."



php artisan key:generate

sleep 10

php artisan migrate --force
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan config:cache

php artisan serve --port=$PORT --host=0.0.0.0 --env=.env
exec docker-php-entrypoint "$@"
