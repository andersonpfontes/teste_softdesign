FROM php:7.4-apache

RUN apt-get -y update \
    && apt-get install -y libicu-dev \
    zip \
    unzip

RUN docker-php-ext-install mysqli
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer