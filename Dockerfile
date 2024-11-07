# Sử dụng PHP 8.1 (hoặc phiên bản phù hợp với Laravel của bạn)
FROM php:8.1-fpm

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

# Mở cổng 8000 (hoặc cổng khác nếu bạn cần)
EXPOSE 8000

# Lệnh khởi động ứng dụng Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
