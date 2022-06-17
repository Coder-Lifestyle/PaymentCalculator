FROM php:8.0.5-fpm
ARG TIMEZONE
#Dockerfile
RUN apt-get update \
    && apt-get install -y libpq-dev git libicu-dev libxml2-dev \
    libzip-dev \
    librabbitmq-dev \
    libssh-dev \
    zip \
    && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-configure intl \
    && docker-php-ext-install \
        intl \
        zip \
        bcmath \
        sockets \
        soap \
        pcntl \
        opcache \
        pdo \
        pdo_mysql


RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer


COPY docker/php-fpm/entry_point.sh /opt/bin/
RUN ["chmod", "+x", "/opt/bin/entry_point.sh"]

WORKDIR /var/www/paymentcalculator

CMD ["/opt/bin/entry_point.sh"]

#RUN chown -R 1000:1000 /var/www/paymentcalculator

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

COPY docker/php-fpm/ini/memory_limit.ini /usr/local/etc/php/conf.d

