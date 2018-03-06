FROM php:5.6-fpm

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    git \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Type docker-php-ext-install to see available extensions
RUN docker-php-ext-install pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

RUN curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony && \
	chmod a+x /usr/local/bin/symfony
RUN symfony --version

WORKDIR /var/www/symfony
