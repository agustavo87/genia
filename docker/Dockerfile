FROM php:8.3-cli

ARG WWWGROUP=1000
ARG WWWUSER=1000

WORKDIR /usr/src/myapp

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions zip gd

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN groupadd --force -g $WWWGROUP web
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u $WWWUSER web

RUN apt-get update \
    && apt-get install -y unzip zip

USER web