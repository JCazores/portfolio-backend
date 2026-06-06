FROM dunglas/frankenphp

RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    xml \
    bcmath \
    opcache

COPY . /app

WORKDIR /app

RUN composer install --no-dev --optimize-autoloader

ENV SERVER_NAME=":8080"

EXPOSE 8080
