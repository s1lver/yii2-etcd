FROM php:8.2.30-cli-alpine AS etcd-php

# Installing the main image packages
RUN apk add git libzip-dev icu-dev autoconf g++ make linux-headers

# Installing PHP extensions
RUN docker-php-ext-install zip sockets intl pcntl opcache bcmath
RUN MAKEFLAGS="-j$(nproc)" yes | pecl install grpc-1.76.0 protobuf-4.33.3 xdebug-3.5.0 pcov-1.0.12
RUN docker-php-ext-enable grpc protobuf xdebug pcov

# Installing protoc utils
ADD https://github.com/protocolbuffers/protobuf/releases/download/v33.3/protoc-33.3-linux-x86_64.zip /usr/local

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

CMD ["sleep", "infinity"]
