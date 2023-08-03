FROM php:8.1-apache

RUN apt-get update && apt-get install -y --no-install-recommends apt-utils
RUN apt-get install -y zip unzip gettext --no-install-recommends

RUN docker-php-ext-install gettext
RUN a2enmod rewrite
COPY public/ /var/www/html/
COPY src/ /var/www/src/
COPY config.docker.php /var/www/config.php
COPY composer.json /var/www/composer.json
COPY composer.lock /var/www/composer.lock

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/
RUN composer install

EXPOSE 80