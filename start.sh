#!/bin/bash

# Attendre que la base de données soit prête
echo "🔄 Attente de la base de données..."
sleep 5

# Exécuter les migrations
echo "🔄 Exécution des migrations..."
php artisan migrate --force

# Exécuter le seeding
echo "🔄 Exécution du seeding..."
php artisan db:seed

# Démarrer le serveur
echo "🚀 Démarrage du serveur sur le port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
