FROM php:fpm-alpine

#COPY wait-for-it.sh /usr/bin/wait-for-it

#RUN chmod +x /usr/bin/wait-for-it

RUN apk --update --no-cache add git

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql

RUN apk add postgresql postgresql-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql

#COPY --from=composer /usr/bin/composer /usr/bin/composer

#RUN echo "extension=php_pgsql.so " >> "$PHP_INI_DIR/php.ini"

WORKDIR /var/www

#CMD composer install ; wait-for-it database:3306 -- bin/console doctrine:migrations:migrate ;  php-fpm

EXPOSE 9000
