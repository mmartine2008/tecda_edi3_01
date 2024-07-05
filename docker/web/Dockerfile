FROM php:8.0-apache

RUN apt-get update 

RUN docker-php-ext-install pdo 

RUN apt-get update 

RUN apt-get install -y libzip-dev libonig-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install gd 

RUN docker-php-ext-configure gd --with-freetype

RUN docker-php-ext-install gd

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN docker-php-ext-install mbstring

RUN docker-php-ext-install zip

RUN apt-get update && apt-get install -y gnumeric

ENV DEBIAN_FRONTEND noninteractive

ENV LC_ALL=C

RUN a2enmod rewrite 

COPY conf/apache2/sites-enabled/000-default.conf /etc/apache2/sites-enabled
COPY . /var/www/html

WORKDIR /var/www/html
