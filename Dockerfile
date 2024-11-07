# Sử dụng PHP 8.3.9 (hoặc phiên bản phù hợp với Laravel của bạn)
FROM php:8.3.9-fpm

# Cài đặt các tiện ích và extension cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài đặt Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Sao chép mã nguồn vào container
COPY . /var/www

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Cài đặt dependencies của Laravel
RUN composer install --no-dev --optimize-autoloader

# Thiết lập quyền cho thư mục lưu trữ và bộ nhớ đệm
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Mở cổng 9000 cho PHP-FPM (nếu dùng với nginx)
EXPOSE 8000

# Lệnh khởi động PHP-FPM
CMD ["php-fpm"]
