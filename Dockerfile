FROM php:8.3-fpm-alpine AS build

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apk add --no-cache \
    zip \
    libzip-dev \
    freetype \
    libjpeg-turbo \
    libpng \
    freetype-dev \
    libjpeg-turbo-dev \
    libpng-dev \
    oniguruma-dev \
    gettext-dev \
    icu-dev \
    nginx \
    nodejs \
    npm \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ \
    && docker-php-ext-install zip pdo pdo_mysql bcmath exif gettext intl opcache \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-enable gd zip pdo pdo_mysql bcmath exif gettext intl opcache \
    && rm -rf /var/cache/apk/*

COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer update \
    && composer install\
    && npm update \
    && npm install \
    && npm run build

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html

COPY ./.deploy/nginx.conf /etc/nginx/http.d/default.conf

EXPOSE 8080
