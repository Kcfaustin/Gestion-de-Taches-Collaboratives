# 🚀 Déploiement sur Railway

## 📋 Prérequis

1. **Compte Railway** : Créez un compte sur [railway.app](https://railway.app)
2. **GitHub** : Votre code doit être sur GitHub
3. **Base de données** : Railway fournit PostgreSQL gratuitement

## 🚀 Déploiement automatique

### 1. **Créer un projet Railway :**
- Allez sur [railway.app](https://railway.app)
- Cliquez sur "New Project"
- Sélectionnez "Deploy from GitHub repo"
- Choisissez votre repository `Gestion-de-Taches-Collaboratives`

### 2. **Configuration automatique :**
Railway va automatiquement :
- ✅ Détecter que c'est un projet Laravel
- ✅ Installer les dépendances PHP
- ✅ Configurer le serveur web
- ✅ Créer une base de données PostgreSQL

### 3. **Variables d'environnement :**
Configurez ces variables dans Railway :

```bash
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:VOTRE_CLE_ICI
APP_DEBUG=false
APP_URL=https://votre-app.railway.app

DB_CONNECTION=pgsql
DB_HOST=postgres.railway.internal
DB_PORT=5432
DB_DATABASE=railway
DB_USERNAME=postgres
DB_PASSWORD=VOTRE_MOT_DE_PASSE

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### 4. **Exécuter les migrations :**
```bash
# Dans le terminal Railway
php artisan migrate --force
php artisan db:seed
```

## 🌐 Accès à l'application

- **URL** : `https://votre-app.railway.app`
- **Admin** : `admin@example.com` / `password1234`

## 🔧 Commandes utiles

```bash
# Voir les logs
railway logs

# Accéder à la console
railway shell

# Redémarrer l'application
railway restart

# Voir les variables d'environnement
railway variables
```

## 💰 Coûts

- **Plan gratuit** : 500 heures/mois
- **Base de données** : PostgreSQL gratuite
- **Bande passante** : 100GB/mois gratuits
- **Stockage** : 1GB gratuit

## 🆘 Dépannage

### Problème de base de données :
```bash
railway shell
php artisan migrate:status
php artisan migrate --force
```

### Problème de cache :
```bash
railway shell
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Voir les erreurs :
```bash
railway logs --tail
```

## 🎯 Avantages Railway

- ✅ **100% gratuit** jusqu'à 500h/mois
- ✅ **Base de données incluse**
- ✅ **Déploiement automatique**
- ✅ **Interface simple**
- ✅ **Logs en temps réel**
- ✅ **Variables d'environnement faciles**
