#!/bin/bash
composer install && \
composer dump-autoload && \
php -S 0.0.0.0:8000