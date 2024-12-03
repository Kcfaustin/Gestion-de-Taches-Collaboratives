framework_2024_faustin-elisee

Plateforme de gestion de tâches collaboratives

# Site de Gestion - Laravel

## Description
Ce projet est une application web construite avec Laravel, permettant :  
- La gestion des utilisateurs et des rôles (admin/utilisateur).  
- La création, la modification et la suppression de projets.  
- L'attribution de tâches à des utilisateurs spécifiques.  
- La gestion et le suivi des tâches avec différents statuts : **non commencé**, **en cours**, **terminé**.  
- La génération de statistiques pour les administrateurs et les utilisateurs.  

---

## Fonctionnalités Principales
- **Administrateurs** :  
  - Gérer les utilisateurs (ajouter, modifier, supprimer).  
  - Visualiser et gérer tous les projets et tâches.  
  - Accéder aux statistiques globales.  

- **Utilisateurs** :  
  - Gérer les projets et les tâches.
  - Consulter les projets et tâches assignés.
  - Mettre à jour le statut des tâches assignées.  
  - Visualiser leurs statistiques personnelles. 
  - Les utilisateurs reçoivent une notification lorsqu’une tâche leur est assignée. 

- **Gestion des Projets et Tâches** :  
  - CRUD pour les projets et tâches.  
  - Attribution des tâches aux utilisateurs.  
  - Filtrage des tâches par projet, statut ou priorité.  

---

## Installation et Configuration

### Prérequis
1. PHP 8.1 ou supérieur  
2. Composer 2.x  
3. MySQL 8.x  
4. Node.js et NPM  

### Étapes d'installation
1. Clonez ce dépôt dans votre environnement local :  
   ```bash
   git clone https://github.com/Kcfaustin/Gestion-de-Taches-Collaboratives.git
   cd Gestion-de-Taches-Collaboratives

2. Installez les dépendances :

    - composer install
    - npm install
    - npm run dev

3. Configurez l'environnement :
    Copiez le fichier .env.example et renommez-le en .env.
    Modifiez les valeurs pour correspondre à votre configuration (base de données, mail, etc.) :

    - cp .env.example .env
    - php artisan key:generate

4. Configurez la base de données :

    - Créez une base de données.
    - Modifiez les paramètres dans .env.
    - Appliquez les migrations et les seeders :
    - php artisan migrate --seed

5. Lancez le serveur de développement :

    - php artisan serve

6. Accédez à l'application dans votre navigateur :

http://localhost:8000

#### Fonctionnalités Techniques
    Routes :
    Les routes sont sécurisées et organisées avec des middlewares auth et admin.
    Gestion des fichiers sensibles :
    Le fichier .gitignore est configuré pour ignorer :
    /vendor
    /node_modules
    .env
    Et d'autres fichiers sensibles.

##### Déploiement

Pour déployer sur un serveur de production :

1. Installez les dépendances en mode production :

    composer install --no-dev
    npm run build

2. Configurez les permissions pour le stockage :

    chmod -R 775 storage bootstrap/cache

3. Configurez une tâche cron pour la gestion des tâches planifiées :

    php artisan schedule:run >> /dev/null 2>&1

   ## Auteurs

    Faustin AGOHOUNDJE et KETOUNOU Elisée
    
   ## Licence
    Ce projet est sous licence MIT.
