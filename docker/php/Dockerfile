FROM php:8.2-fpm-alpine

RUN apk add --no-cache curl git build-base zlib-dev oniguruma autoconf bash openssl-dev
RUN apk add --update linux-headers nodejs npm

# Install MongoDB extension
RUN pecl install mongodb && \
    docker-php-ext-enable mongodb

COPY ./ /var/www/
WORKDIR /var/www/

#Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD php-fpm

EXPOSE 9000
