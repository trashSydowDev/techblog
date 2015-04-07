FROM php:5.6-apache

# Install modules
RUN apt-get update && apt-get install -y \
        git \
        php5-dev \
        libmcrypt-dev \
    && docker-php-ext-install mcrypt mbstring zip

# Install composer
RUN curl -sS https://getcomposer.org/installer \
        | php -- --install-dir=/usr/local/bin \
        && mv /usr/local/bin/composer.phar /usr/local/bin/composer

# Configure apache
RUN sed -i "s/DocumentRoot .*/DocumentRoot \/var\/www\/html\/public/" /etc/apache2/apache2.conf
RUN a2enmod rewrite

COPY . /var/www/html/
