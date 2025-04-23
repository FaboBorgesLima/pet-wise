FROM composer/composer AS builder

WORKDIR /build
COPY . .

RUN composer install
RUN composer update

FROM php:8.2-apache

COPY --from=builder /build/ /var/www/html/
WORKDIR /var/www/html

COPY apache2.conf /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql