
FROM php:8.3.9 as php

RUN apt-get update -y && \
    apt-get install -y unzip libpq-dev libcurl4-gnutls-dev

RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /var/www
COPY . .

COPY --from=composer:2.8.2 /usr/bin/composer /usr/bin/composer

ENV PORT=8000
CMD ["sh", "Docker/entrypoint.sh"]
