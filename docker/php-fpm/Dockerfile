FROM php:5.6-fpm-alpine

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql
ADD symfony.ini /usr/local/etc/php/conf.d/

RUN apk upgrade --update && apk add --no-cache \
  freetype-dev \
  libjpeg-turbo-dev \
  libjpeg \
  libltdl \
  libwebp-dev \
  libmcrypt-dev \
  libpng \
  libpng-dev \
  autoconf \
  g++ \
  make \
&& docker-php-ext-install mcrypt exif \
&& docker-php-ext-configure gd --with-jpeg-dir=/usr/include --with-png-dir=/usr/include --with-webp-dir=/usr/include --with-freetype-dir=/usr/include \
&& docker-php-ext-install gd

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/America/Guatemala /etc/localtime
RUN "date"

WORKDIR /var/www/symfony
