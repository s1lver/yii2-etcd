FROM --platform=linux/amd64 php:8.1.14-cli-alpine AS etcd-php

# Installing the main image packages
RUN apk add git libzip-dev icu-dev autoconf g++ make linux-headers

# Installing PHP extensions
RUN docker-php-ext-install zip sockets intl pcntl opcache bcmath
RUN printf "\n" | pecl install grpc-1.53.0 protobuf-3.22.1 xdebug-3.2.1 pcov-1.0.11
RUN docker-php-ext-enable grpc protobuf xdebug pcov

# Installing protoc utils
RUN wget https://github.com/protocolbuffers/protobuf/releases/download/v22.1/protoc-22.1-linux-x86_64.zip -O /tmp/protoc.zip \
    && unzip /tmp/protoc.zip -d $HOME/.local
RUN export PATH="$PATH:$HOME/.local/bin"

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www

ENTRYPOINT ["sh", "tests/docker/entrypoint.sh"]