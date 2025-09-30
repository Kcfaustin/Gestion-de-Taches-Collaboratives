# Base image with Nginx + PHP-FPM
FROM webdevops/php-nginx:8.2-alpine

# Set working directory
WORKDIR /app

# Install system dependencies needed for PHP extensions and node
RUN apk add --no-cache git nodejs npm bash

# Copy composer files first for better layer caching
COPY composer.json composer.lock ./

# Install PHP dependencies (no dev in production)
RUN composer install \
    --no-interaction \
    --no-dev \
    --prefer-dist \
    --no-progress \
    --optimize-autoloader

# Copy rest of the application
COPY . .

# Copy default nginx config from image and adjust document root
ENV WEB_DOCUMENT_ROOT=/app/public

# Node build for frontend assets (Vite)
RUN npm install && npm run build && rm -rf node_modules

# Optimize Laravel
RUN php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache || true

# Permissions for storage and cache
RUN chown -R application:application storage bootstrap/cache \
 && chmod -R ug+rwX storage bootstrap/cache

# Default port
EXPOSE 8080

# On container start, run migrations then start services
CMD bash -lc "php artisan migrate --force || true; /opt/docker/bin/entrypoint supervisord"


