
FROM php:8.3.9 as php


RUN apt-get update -y && \
    apt-get install -y unzip libpq-dev libcurl4-gnutls-dev


RUN docker-php-ext-install pdo pdo_mysql bcmath

RUN echo "extension=redis.so" >> /usr/local/etc/php/conf.d/docker-php-ext-redis.ini

RUN pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis


WORKDIR /var/www
COPY ./php.ini /usr/local/etc/php/
COPY . .


COPY --from=composer:2.8.2 /usr/bin/composer /usr/bin/composer


ENV PORT=8000
ENTRYPOINT [ "docker/entrypoint.sh" ]
