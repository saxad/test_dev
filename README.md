
# Laravel Example App
## Installation

Cloner le  dépôt

    git clone https://github.com/saxad/test_dev.git
    
Basculer vers le dossier du dépôt

    cd test_dev

Installer toutes les dépendances en utilisant composer

    composer install

Copier le fichier .example.env vers .env puis configurer le fichier .env 

    cp .env.example .env

Lancer les migrations pour la base de données  (**FAUT CREER LA BASE DE DENNEES stars et la rajouter dans la config .env avant la migration**)

    php artisan migrate

