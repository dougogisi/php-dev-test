FROM php:7.1-cli-alpine

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN composer global require phpunit/phpunit
ENV PATH="/root/.composer/vendor/bin/:${PATH}"

WORKDIR /code

ENTRYPOINT ["tail", "-f", "/dev/null"]
