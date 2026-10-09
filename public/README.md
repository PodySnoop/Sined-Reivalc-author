🎼 Sined Reivalc – Plateforme Auteur-Compositeur
Plateforme Laravel permettant à uncompositeur  de gérer ses chansons et ses inspirations, tout en offrant aux visiteurs une navigation musicale par émotions. Les visiteurs peuvent communiquer avec le compositeur via les messages ou les compositeurs

🎯 Description
Sined Reivalc est une application Laravel qui permet :

Aux visiteurs :
Découvrir les chansons par genre, inspiration, émotion, commenter et envoyer des suggestions.

Aux compositeurs :
Gérer leurs chansons (CRUD), consulter leurs messages, modérer les commentaires, uploader des fichiers audio, images ou PDF.

À l’administrateur :
Gérer les utilisateurs, les chansons, les commentaires, les messages et les paramètres du site.

🛠 Technologies
Laravel 12.x

PHP 8.2+

Blade Templates

TailwindCSS

Vite

Laravel Breeze (authentification)

SQLite / MySQL / PostgreSQL

Pest PHP (tests)

📋 Prérequis
PHP 8.2+

Composer

Node.js & NPM

Git

Serveur Laravel (local ou hébergeur)

🚀 Installation
bash
# Cloner le projet
git clone <votre-repo>
cd Sined-Reivalc-author

# Installer les dépendances
composer install
npm install

# Copier la configuration
cp .env.example .env
php artisan key:generate

# Migrations
php artisan migrate

# Compiler les assets
npm run build

# Lancer le serveur
php artisan serve
👥 Rôles utilisateurs
🟦 Visiteur
Accueil

Recherche

Consultation des chansons

Inspirations musicales

Commentaires

Suggestions

🟧 Compositeur
Toutes les fonctionnalités visiteur

Dashboard personnalisé

Gestion des chansons (CRUD)

Upload PDF / images / audio

Gestion des commentaires

Gestion des messages

Changement de mot de passe

🟥 Administrateur
Dashboard admin

Gestion des utilisateurs

Vue globale des chansons

Modération des commentaires

Gestion des messages

Paramètres du site

🎨 Fonctionnalités principales
Pages publiques
Accueil inspiré par les genres musicaux

Liste des chansons + filtres

Page détail chanson

Commentaires & suggestions

Inspirations musicales (Soul-Jazz, Antillaise-Africaine, Française, Reggae)

Espace Compositeur
Dashboard

Gestion des chansons

Modération des commentaires

Gestion des messages

Espace Admin
Statistiques globales

Gestion des utilisateurs

Modération du contenu

Messages & suggestions

📁 Structure du projet
Code
app/
 ├── Http/Controllers/
 │    ├── SongController.php
 │    ├── CommentController.php
 │    ├── InspirationController.php
 │    ├── HomeController.php
 │    ├── SearchController.php
 │    ├── MessageController.php
 │    ├── AdminController.php
 │    └── CompositeurDashboardController.php
 ├── Models/
 │    ├── Chanson.php
 │    ├── Commentaire.php
 │    └── User.php

resources/views/
 ├── layouts/
 ├── home.blade.php
 ├── chansons/
 ├── compositeur/
 ├── admin/
 ├── inspirations/
 ├── legal.blade.php
 └── privacy.blade.php

routes/web.php
public/storage/
🎵 Genres musicaux supportés
Soul-Jazz

Antillaise-Africaine

Française

Reggae

📤 Types de fichiers supportés
Images : JPG, JPEG, PNG (max 20MB)

Audio : MP3, WAV, OGG (max 50MB)

Documents : PDF (max 20MB)

🔧 Commandes utiles
bash
php artisan serve
composer run dev
composer run test
php artisan test

php artisan cache:clear
php artisan view:clear
php artisan config:clear

php artisan migrate:fresh --seed
🔐 Sécurité
Authentification Laravel Breeze

Middleware par rôle

Validation des uploads

Protection CSRF

robots.txt pour empêcher l’indexation

📄 Pages légales
/mentions-legales

/politique-de-confidentialite

🤝 Contribution
Projet développé pour Sined Reivalc, auteur-compositeur.

📝 Licence
MIT