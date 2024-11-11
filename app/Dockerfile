FROM php:8-apache

COPY . /var/www/html
COPY apache2.conf /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql