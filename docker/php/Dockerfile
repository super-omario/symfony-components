FROM php:8.3-fpm-alpine

RUN apk update \
    && apk upgrade \
    && apk add --no-cache \
        bash \
        git \
        postgresql-dev \
        libzip-dev \
        autoconf \
        make \
        libxslt-dev

RUN docker-php-ext-install \
    pdo \
    pdo_pgsql \
    zip \
    xsl \
    intl

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer

RUN wget https://get.symfony.com/cli/installer -O - | bash \
    && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

###> PhpRedis ###
RUN pecl install redis \
    && docker-php-ext-enable redis
###< PhpRedis ###

WORKDIR /var/www/project
