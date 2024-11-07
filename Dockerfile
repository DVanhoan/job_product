# Sử dụng image PHP và Apache
FROM php:8.3.9-apache

# Cài đặt các extension PHP cần thiết
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tạo thư mục cho ứng dụng và copy mã nguồn vào
WORKDIR /var/www/html
COPY . .

# Cài đặt Composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Tạo file .env
COPY .env.example .env

# Thiết lập các quyền cần thiết cho storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Lệnh khởi chạy
CMD php artisan serve --host=0.0.0.0 --port=80
