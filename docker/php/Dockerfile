FROM php:7.3-fpm

# install composer
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php \
    && curl -sL https://deb.nodesource.com/setup_11.x | bash - \
    && ln -s /usr/bin/composer.phar /usr/bin/composer \
    && apt-get update \
    && apt-get install -y \
    nodejs \
    libpq-dev \
    git \
    zip \
    unzip \
    vim \
    && docker-php-ext-install pdo_mysql pdo_pgsql \
    && npm install npm@latest -g

WORKDIR /var/www/html
