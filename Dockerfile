# Utiliser l'image PHP officielle avec Composer
FROM php:8.2-cli

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Exécuter les scripts post-installation
RUN composer run-script post-autoload-dump

# Installer les dépendances Node.js et compiler les assets
RUN npm install && npm run build

# Exposer le port
EXPOSE 8000

# Commande de démarrage avec migrations et seeding
CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed && php artisan serve --host=0.0.0.0 --port=8000"]
