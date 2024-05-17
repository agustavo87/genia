#!/usr/bin/env bash

if [ -d "vendor" ]; then
    php artisan serve --host=0.0.0.0 --port=80
else
    composer create-project
    exec "$0"
fi
