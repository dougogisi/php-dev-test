FROM php:7.1-cli-alpine

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN apk add --no-cache libzip-dev && docker-php-ext-install zip && composer global require codeception/codeception
ENV PATH="/root/.composer/vendor/bin/:${PATH}"

WORKDIR /code

ENTRYPOINT ["tail", "-f", "/dev/null"]
