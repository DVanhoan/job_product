# Sử dụng image PHP chính thức làm base image
FROM php:8.3.9-fpm AS base

# Cài đặt các dependencies cần thiết cho Composer và PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql mbstring gd \
    && rm -rf /var/lib/apt/lists/*

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy file composer.json và composer.lock vào container trước để cache các dependencies Composer
COPY composer.json composer.lock ./

# Cho phép Composer chạy với quyền root (không khuyến khích nhưng dùng tạm)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Cài đặt Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts --prefer-dist

# Sao chép mã nguồn và file .env vào container
COPY . .
COPY .env.example .env

# Cài đặt permissions cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Thiết lập biến môi trường để chạy ứng dụng Laravel trong môi trường sản xuất
ENV APP_ENV=production
ENV APP_DEBUG=false

# Khởi tạo APP_KEY
RUN php artisan key:generate --force

# Expose cổng cho ứng dụng PHP-FPM
EXPOSE 9000

# Chạy PHP-FPM
CMD ["php-fpm"]
