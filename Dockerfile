FROM php:7.3-apache
LABEL maintainer="oussema@tledger.tech"
RUN apt-get -y update && \
    apt-get -y install bash vim build-essential libssl-dev zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev libicu-dev
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql intl curl mysqli zip mbstring
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd
WORKDIR /var/www/html/app
COPY ./startup.sh /tmp
RUN chmod 777 /tmp/startup.sh
ENV APP_ENV=development
ENTRYPOINT [ "/tmp/startup.sh" ]