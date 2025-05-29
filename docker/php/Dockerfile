FROM php:8.4-fpm-alpine

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

###> symfony/panther ###
# Chromium and ChromeDriver
ENV PANTHER_NO_SANDBOX=1
# Not mandatory, but recommended
ENV PANTHER_CHROME_ARGUMENTS='--disable-dev-shm-usage'
RUN apk add --no-cache chromium chromium-chromedriver

# Firefox and GeckoDriver (optional)
ARG GECKODRIVER_VERSION=0.28.0
RUN apk add --no-cache firefox
RUN wget -q https://github.com/mozilla/geckodriver/releases/download/v$GECKODRIVER_VERSION/geckodriver-v$GECKODRIVER_VERSION-linux64.tar.gz; \
    tar -zxf geckodriver-v$GECKODRIVER_VERSION-linux64.tar.gz -C /usr/bin; \
    rm geckodriver-v$GECKODRIVER_VERSION-linux64.tar.gz
###< symfony/panther ###

WORKDIR /var/www/project
