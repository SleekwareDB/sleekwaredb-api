FROM php:8.1.18-fpm-bullseye

WORKDIR /var/www/html

# Install required packages
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libicu-dev \
        libjpeg-dev \
        libmagickwand-dev \
        libpng-dev \
        libwebp-dev \
        libzip-dev \
        curl \
        git \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install -j "$(nproc)" \
        pdo \
        pdo_mysql \
        mysqli \
        bcmath \
        exif \
        gd \
        intl \
        zip \
    && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
    && set -eux; \
        docker-php-ext-enable opcache; \
        { \
        echo 'opcache.memory_consumption=128'; \
        echo 'opcache.interned_strings_buffer=8'; \
        echo 'opcache.max_accelerated_files=4000'; \
        echo 'opcache.revalidate_freq=2'; \
        echo 'opcache.fast_shutdown=1'; \
        } > /usr/local/etc/php/conf.d/opcache-recommended.ini \
    && pecl install xdebug && docker-php-ext-enable xdebug \
    && pecl install imagick && docker-php-ext-enable imagick

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create user and set permissions
RUN adduser sleekwaredb-user \
    && chown -R sleekwaredb-user:sleekwaredb-user /var/www/html \
    && chmod -R 755 /var/www/html

USER sleekwaredb-user

# Healthcheck
HEALTHCHECK --interval=30s --timeout=10s --retries=3 \
    CMD curl --fail http://localhost:9000/fpm-ping || exit 1

# Start PHP-FPM
CMD ["php-fpm"]
