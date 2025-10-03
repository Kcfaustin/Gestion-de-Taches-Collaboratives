# Déploiement sur Railway

## Configuration requise

1. **Compte Railway** : Créez un compte sur [railway.app](https://railway.app)
2. **Base de données MySQL** : Utilisez MySQL à distance (ex: Hostinger)

## Étapes de déploiement

### 1. Préparer le projet

```bash
# Installer les dépendances
composer install --no-dev --optimize-autoloader
npm install
npm run build

# Générer la clé d'application
php artisan key:generate
```

### 2. Déployer sur Railway

1. Connectez votre repository GitHub à Railway
2. Railway détectera automatiquement le Dockerfile
3. Configurez la connexion à votre base de données MySQL Hostinger
4. Configurez les variables d'environnement

### 3. Configuration MySQL Hostinger

1. **Connectez-vous à votre panneau Hostinger**
2. **Allez dans "Bases de données MySQL"**
3. **Notez les informations de connexion :**
   - Nom d'hôte (ex: mysql.hostinger.com)
   - Nom de la base de données
   - Nom d'utilisateur
   - Mot de passe
   - Port (généralement 3306)

### 4. Variables d'environnement

Configurez ces variables dans Railway :

```
APP_NAME=Laravel
APP_ENV=production
APP_KEY=base64:your-generated-key
APP_DEBUG=false
APP_URL=https://your-app.railway.app

DB_CONNECTION=mysql
DB_HOST=your-mysql-hostinger-host
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-mysql-username
DB_PASSWORD=your-mysql-password

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### 5. Migrations

Après le déploiement, exécutez les migrations :

```bash
php artisan migrate
```

### 6. Seeders (optionnel)

```bash
php artisan db:seed
```

## Structure des fichiers

- `Dockerfile` : Configuration Docker pour Railway
- `railway.toml` : Configuration Railway spécifique
- `public/` : Fichiers publics Laravel
- `storage/` : Stockage des fichiers (logs, cache, etc.)

## Dépannage

### Problèmes courants

1. **Erreur de permissions** : Vérifiez que les dossiers `storage/` et `bootstrap/cache/` ont les bonnes permissions
2. **Base de données** : Vérifiez que la connexion MySQL Hostinger est correcte
3. **Clé d'application** : Assurez-vous que `APP_KEY` est définie
4. **Connexion MySQL** : Vérifiez que l'IP de Railway est autorisée dans Hostinger

### Logs

Consultez les logs dans le dashboard Railway pour diagnostiquer les problèmes.

## Support

- [Documentation Railway](https://docs.railway.app)
- [Documentation Laravel](https://laravel.com/docs)