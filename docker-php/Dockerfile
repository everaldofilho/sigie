FROM php:7.3-apache-stretch
RUN cd /etc/apache2/mods-available/ \
    && a2enmod rewrite \
    && apt-get update -y \
    && apt-get install -y libpq-dev \
    && apt-get install -y unzip \
    && apt-get install -y git \
    && apt-get install -y curl \
    && apt-get install -y libzip-dev \
    && apt-get install -y zlib1g-dev \
    && apt-get install -y libxslt-dev \
    && yes | pecl install xdebug-2.7.2 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install zip xsl \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install xmlrpc \
    && export COMPOSER_ALLOW_SUPERUSER=1
RUN usermod -u 431 www-data
COPY apache2/site.conf /etc/apache2/sites-enabled/000-default.conf
