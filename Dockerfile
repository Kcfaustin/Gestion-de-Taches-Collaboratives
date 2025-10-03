# DO NOT USE BUILDPACK - USE DOCKER ONLY
# Railway Dockerfile - Force Docker build, ignore buildpack detection
FROM php:8.2-cli

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd mbstring xml

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers
COPY . .

# Installer les dépendances
RUN composer install --no-dev --optimize-autoloader --no-scripts && \
    composer run-script post-autoload-dump && \
    npm install && npm run build

# Créer le répertoire storage et donner les permissions
RUN mkdir -p storage/logs storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Exposer le port (Railway définit le port via $PORT)
EXPOSE 8000

# L'application sera démarrée via railway.toml startCommand
# Pas de CMD pour éviter la détection du buildpack
