FROM php:8.1.14-cli-alpine AS etcd-php

# Installing the main image packages
RUN apk add git libzip-dev icu-dev autoconf g++ make linux-headers

# Installing PHP extensions
RUN docker-php-ext-install zip sockets intl pcntl opcache bcmath
RUN printf "\n" | pecl install grpc-1.53.0 protobuf-3.22.1 xdebug-3.2.1 pcov-1.0.11
RUN docker-php-ext-enable grpc protobuf xdebug pcov

# Installing protoc utils
ADD https://github.com/protocolbuffers/protobuf/releases/download/v22.3/protoc-22.3-linux-x86_64.zip /usr/local

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

CMD ["sleep", "infinity"]
