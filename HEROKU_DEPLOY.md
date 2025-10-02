# 🚀 Déploiement sur Heroku

## 📋 Prérequis

1. **Compte Heroku** : Créez un compte sur [heroku.com](https://heroku.com)
2. **Heroku CLI** : Installez-le depuis [devcenter.heroku.com](https://devcenter.heroku.com/articles/heroku-cli)
3. **Git** : Assurez-vous que Git est installé

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
heroku create votre-nom-app
```

3. **Ajouter la base de données** :
```bash
heroku addons:create jawsdb-maria:kitefin
```

4. **Configurer les variables** :
```bash
heroku config:set APP_ENV=production
heroku config:set APP_DEBUG=false
heroku config:set DB_CONNECTION=mysql
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
- **Base de données** : JawsDB MariaDB (gratuit jusqu'à 5MB)
- **Dyno** : Se met en veille après 30min d'inactivité

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
