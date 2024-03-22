FROM php:8.3-cli

ARG WWWGROUP=1000
ARG WWWUSER=1000

WORKDIR /usr/src/myapp

RUN groupadd --force -g $WWWGROUP web
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u $WWWUSER web

USER web