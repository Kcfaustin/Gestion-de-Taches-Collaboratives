# 🚀 Déploiement sur Heroku

## 📋 Prérequis

1. **Compte Heroku** : Créez un compte sur [heroku.com](https://heroku.com)
2. **Heroku CLI** : Installez-le depuis [devcenter.heroku.com](https://devcenter.heroku.com/articles/heroku-cli)
3. **Git** : Assurez-vous que Git est installé
4. **Base de données Hostinger** : Créez une base de données MySQL sur Hostinger

## 🗄️ Configuration de la base de données Hostinger

### Étapes sur Hostinger :

1. **Connectez-vous** à votre panneau Hostinger
2. **Allez dans "Bases de données MySQL"**
3. **Créez une nouvelle base de données** :
   - Nom : `gestion_taches` (ou similaire)
   - Utilisateur : Créez un utilisateur dédié
   - Mot de passe : Générez un mot de passe fort
4. **Notez les informations** :
   - Hôte : `mysql.hostinger.com` (ou similaire)
   - Port : `3306`
   - Nom de la base : `u123456789_gestion_taches`
   - Utilisateur : `u123456789_admin`
   - Mot de passe : `votre_mot_de_passe`

### Import des tables :

Une fois déployé, exécutez les migrations :
```bash
heroku run php artisan migrate --force
heroku run php artisan db:seed
```

## 🔧 Installation Heroku CLI

### Windows :
```bash
# Téléchargez et installez depuis le site officiel
# Ou avec Chocolatey :
choco install heroku-cli

# Ou avec Scoop :
scoop install heroku
```

### macOS :
```bash
brew tap heroku/brew && brew install heroku
```

### Linux :
```bash
curl https://cli-assets.heroku.com/install.sh | sh
```

## 🚀 Déploiement automatique

### Option 1 : Script automatique (recommandé)
```bash
# Exécutez le script de déploiement
./deploy-heroku.sh
```

### Option 2 : Déploiement manuel

1. **Connexion à Heroku** :
```bash
heroku login
```

2. **Créer l'application** :
```bash
heroku create gestiontache-app
```

3. **Configurer les variables de base de données Hostinger** :
```bash
# Variables de base
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set DB_CONNECTION=mysql

# Variables de base de données Hostinger (remplacez par vos vraies valeurs)
heroku config:set DB_HOST=mysql.hostinger.com
heroku config:set DB_PORT=3306
heroku config:set DB_DATABASE=u123456789_gestion_taches
heroku config:set DB_USERNAME=u123456789_admin
heroku config:set DB_PASSWORD=votre_mot_de_passe
```

5. **Déployer** :
```bash
git add .
git commit -m "Deploy to Heroku"
git push heroku main
```

6. **Exécuter les migrations** :
```bash
heroku run php artisan migrate --force
heroku run php artisan db:seed
```

## 🌐 Accès à l'application

- **URL** : `https://votre-nom-app.herokuapp.com`
- **Admin** : `admin@example.com` / `password1234`

## 🔧 Commandes utiles

```bash
# Voir les logs
heroku logs --tail

# Accéder à la console
heroku run php artisan tinker

# Redémarrer l'application
heroku restart

# Voir les variables d'environnement
heroku config

# Ouvrir l'application dans le navigateur
heroku open
```

## 💰 Coûts

- **Plan gratuit** : 550-1000 heures/mois
- **Base de données** : MySQL Hostinger (votre propre base)
- **Dyno** : Se met en veille après 30min d'inactivité
- **Avantage** : Pas de limitation de taille de base de données

## 🆘 Dépannage

### Problème de base de données :
```bash
heroku run php artisan migrate:status
heroku run php artisan migrate:reset
heroku run php artisan migrate --force
```

### Problème de cache :
```bash
heroku run php artisan config:clear
heroku run php artisan cache:clear
heroku run php artisan view:clear
```

### Voir les erreurs :
```bash
heroku logs --tail --app votre-nom-app
```
