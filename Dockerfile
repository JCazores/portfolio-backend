FROM dunglas/frankenphp

RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    xml \
    bcmath \
    opcache

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /app

WORKDIR /app

RUN composer install --no-dev --optimize-autoloader

ENV SERVER_NAME=":8080"

EXPOSE 8080
