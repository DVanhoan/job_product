# Base image với PHP-FPM
FROM php:8.3.9-fpm AS base

# Cài đặt NGINX và các dependency khác
RUN apt-get update && apt-get install -y \
    nginx \
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

# Sao chép các file cần thiết
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts --prefer-dist
COPY . .

# Sao chép file cấu hình NGINX
COPY ./nginx.conf /etc/nginx/nginx.conf

# Tạo permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 cho NGINX
EXPOSE 80

# Khởi động NGINX và PHP-FPM
CMD service nginx start && php-fpm
