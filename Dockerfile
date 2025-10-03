# Utiliser l'image PHP officielle avec Composer
FROM php:8.2-cli

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installer Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Définir le répertoire de travail
WORKDIR /app

# Copier les fichiers de l'application
COPY . .

# Installer les dépendances PHP (maintenant que les extensions sont installées)
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Exécuter les scripts post-installation
RUN composer run-script post-autoload-dump

# Installer les dépendances Node.js et compiler les assets
RUN npm install && npm run build

# Copier le script de démarrage
COPY start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Exposer le port Railway
EXPOSE 8000

# Commande de démarrage
CMD ["/usr/local/bin/start.sh"]
