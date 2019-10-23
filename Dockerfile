FROM php:7.3-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    default-mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql

RUN apt install zip unzip 
RUN apt-get install -y curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt install -y git