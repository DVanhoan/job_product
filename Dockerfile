# Sử dụng image PHP chính thức làm base image
FROM php:8.3.9-fpm AS base

# Cài đặt các dependencies cần thiết cho Composer và PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    nginx \
    supervisor \
    && rm -rf /var/lib/apt/lists/*


RUN mkdir -p /var/log/php-fpm && \
    chown -R www-data:www-data /var/log/php-fpm

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Copy toàn bộ mã nguồn vào container
COPY . .

# Cài đặt Composer dependencies
RUN composer install --optimize-autoloader --no-dev

# Tạo symbolic links cho logs
RUN ln -sf /dev/stdout /var/log/nginx/access.log && ln -sf /dev/stderr /var/log/nginx/error.log

# Cài đặt permissions cho thư mục storage và bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy cấu hình NGINX và Supervisor
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisord.conf

# Expose port cho ứng dụng
EXPOSE 8080


# Lệnh khởi động
CMD ["supervisord", "-c", "/etc/supervisord.conf"]
