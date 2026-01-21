FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpq-dev curl \
 && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip \
 && a2enmod rewrite

# Install Node.js (for Vite build)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
 && apt-get install -y nodejs

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN sed -i 's#/var/www/html#/var/www/html/public#g' /etc/apache2/sites-available/000-default.conf

RUN composer install --no-dev --optimize-autoloader

# Build frontend assets (creates public/build/manifest.json)
RUN npm install && npm run build

RUN chown -R www-data:www-data storage bootstrap/cache public/build || true

COPY start.sh /start.sh
RUN chmod +x /start.sh

ENV PORT=8080
EXPOSE 8080

CMD ["/start.sh"]
