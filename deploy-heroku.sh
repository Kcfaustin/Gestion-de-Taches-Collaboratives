#!/bin/bash

echo "🚀 Déploiement sur Heroku..."

# Vérifier si Heroku CLI est installé
if ! command -v heroku &> /dev/null; then
    echo "❌ Heroku CLI n'est pas installé. Installez-le depuis: https://devcenter.heroku.com/articles/heroku-cli"
    exit 1
fi

# Vérifier si l'utilisateur est connecté à Heroku
if ! heroku auth:whoami &> /dev/null; then
    echo "🔐 Connexion à Heroku..."
    heroku login
fi

# Demander le nom de l'application
read -p "📝 Entrez le nom de votre application Heroku (ou appuyez sur Entrée pour auto-générer): " APP_NAME

if [ -z "$APP_NAME" ]; then
    APP_NAME="gestion-taches-laravel-$(date +%s)"
fi

echo "📦 Création de l'application Heroku: $APP_NAME"

# Créer l'application Heroku
heroku create $APP_NAME

# Configurer les variables d'environnement
echo "⚙️ Configuration des variables d'environnement..."
heroku config:set APP_ENV=production --app $APP_NAME
heroku config:set APP_DEBUG=false --app $APP_NAME
heroku config:set DB_CONNECTION=mysql --app $APP_NAME

# Demander les informations de la base de données Hostinger
echo "🗄️ Configuration de la base de données Hostinger..."
read -p "📝 Entrez l'hôte de votre base de données Hostinger (ex: mysql.hostinger.com): " DB_HOST
read -p "📝 Entrez le nom de votre base de données: " DB_DATABASE
read -p "📝 Entrez le nom d'utilisateur: " DB_USERNAME
read -s -p "📝 Entrez le mot de passe: " DB_PASSWORD
echo ""

# Configurer les variables de base de données
heroku config:set DB_HOST="$DB_HOST" --app $APP_NAME
heroku config:set DB_PORT=3306 --app $APP_NAME
heroku config:set DB_DATABASE="$DB_DATABASE" --app $APP_NAME
heroku config:set DB_USERNAME="$DB_USERNAME" --app $APP_NAME
heroku config:set DB_PASSWORD="$DB_PASSWORD" --app $APP_NAME

# Générer la clé d'application
echo "🔑 Génération de la clé d'application..."
heroku run php artisan key:generate --app $APP_NAME

# Déployer l'application
echo "🚀 Déploiement de l'application..."
git add .
git commit -m "Deploy to Heroku"
git push heroku main

# Exécuter les migrations
echo "🗄️ Exécution des migrations..."
heroku run php artisan migrate --force --app $APP_NAME

# Exécuter les seeders
echo "🌱 Exécution des seeders..."
heroku run php artisan db:seed --app $APP_NAME

echo "✅ Déploiement terminé!"
echo "🌐 Votre application est disponible sur: https://$APP_NAME.herokuapp.com"
echo "👤 Admin: admin@example.com / password1234"
