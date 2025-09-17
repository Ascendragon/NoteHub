FROM php:8.3-fpm-alpine


# Базовые зависимости
RUN apk add --no-cache \
git curl bash icu-dev oniguruma-dev libzip-dev \
libpq-dev autoconf g++ make


# PHP extensions
RUN docker-php-ext-install -j$(nproc) \
intl mbstring zip bcmath pdo pdo_pgsql


# Redis (phpredis)
RUN pecl install redis \
&& docker-php-ext-enable redis


# Opcache
RUN docker-php-ext-install opcache


# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html