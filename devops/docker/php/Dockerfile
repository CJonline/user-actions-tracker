FROM php:7.3.13-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/

RUN apt-get update && apt-get install -y \
    cron \
    git \
    libmcrypt-dev \
    default-libmysqlclient-dev \
    libssl-dev \
    libzip-dev \
    libsodium-dev \
    librabbitmq-dev \
    openssh-client \
    nano \
    && docker-php-ext-install -j$(nproc) mbstring opcache mysqli sodium pdo_mysql zip bcmath sockets

RUN pecl install amqp
RUN docker-php-ext-enable amqp

RUN pecl install xdebug
RUN docker-php-ext-enable xdebug

RUN sed -i '1 a xdebug.remote_autostart=1' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && sed -i '1 a xdebug.idekey="phpstorm"' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && sed -i '1 a xdebug.remote_handler=dbgp' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && sed -i '1 a xdebug.remote_connect_back=1' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && sed -i '1 a xdebug.remote_port=9000' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && sed -i '1 a xdebug.remote_enable=1' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/ \
    && ln -s /usr/local/bin/composer.phar /usr/local/bin/composer

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

RUN mkdir /var/www/.composer /var/www/.ssh \
    && chown -R www-data:www-data /var/www/.composer /var/www/.ssh

USER www-data

