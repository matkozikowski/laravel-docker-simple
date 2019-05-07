FROM php:7.2.6-apache

# Add PHP repository to apt source
RUN apt-get update \
    && apt-get install -y \
        curl \
        git \
    && docker-php-ext-install \
        mysqli \
        pdo_mysql

RUN a2enmod rewrite

# Use new Git
env PATH /usr/local/git/bin:$PATH

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

# Extract project
ADD ./application .

#ONBUILD
RUN composer install

RUN chmod -R 777 storage && chmod -R ug+rwx storage bootstrap/cache && php artisan config:cache
