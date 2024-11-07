# Sử dụng image PHP chính thức làm base image
FROM php:8.3.9-fpm AS base

# Cài đặt các dependencies cần thiết cho Composer và PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ mã nguồn vào container
COPY . .

# Cho phép Composer chạy với quyền root (không khuyến khích nhưng dùng tạm)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Cài đặt Composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Cấu hình môi trường sản xuất (nếu cần)
# RUN php artisan key:generate

# Cài đặt permissions cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Cấu hình port cho container (nếu cần)
EXPOSE 9000

# Khởi động PHP-FPM
CMD ["php-fpm"]
