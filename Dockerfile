FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y unzip zip && rm -rf /var/lib/apt/lists/*

RUN install-php-extensions pdo_mysql mbstring xml bcmath opcache zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN php artisan storage:link || true

CMD sh -c "php artisan serve --host=0.0.0.0 --port=${PORT:-8000}"