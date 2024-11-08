# Sử dụng PHP 8.3.9 với FPM trên Alpine
FROM php:8.3.9-fpm-alpine

# Cài đặt các extension và gói cần thiết với apk
RUN apk update && apk add --no-cache \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    nginx \
    supervisor \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql

# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Tạo thư mục cho sock file của PHP-FPM
RUN mkdir -p /var/run/php && touch /var/run/php/php-fpm.sock

# Sao chép mã nguồn vào container
COPY . /var/www/html/

# Thiết lập thư mục làm việc
WORKDIR /var/www/html

# Cài đặt các gói PHP qua Composer
RUN composer install -vvv

# Thiết lập quyền cho các thư mục
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public

# Tạo thư mục log cho PHP-FPM và Nginx
RUN mkdir -p /var/log/php-fpm /var/log/nginx
RUN docker-php-ext-install pdo_mysql
RUN chmod -R 775 /var/www/html/public

# Sao chép file cấu hình Nginx và Supervisor
COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
# Mở cổng 80
EXPOSE 80

# Khởi động Nginx và PHP-FPM qua Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
