
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

Generer la clé de  l'application 

    php artisan key:generate

Lancer les migrations pour la base de données  (**FAUT CREER LA BASE DE DONNEES stars utf8mb4_general_ci et la rajouter dans la config .env avant la migration**)

    php artisan migrate


Rajouter un lien symbolique entre storage et public

    php artisan storage:link

## erreur / permission

Permissions pour eviter l'erreur  (**The stream or file "path_to_dir/test_dev/storage/logs/laravel.log" could not be opened in append mode: Failed to open stream: Permission non accordée**)

    pour xampp changer  www-data  par daemon

    sudo chown -R $USER:www-data .
    
    sudo find . -type f -exec chmod 664 {} \;   

    sudo find . -type d -exec chmod 775 {} \;
