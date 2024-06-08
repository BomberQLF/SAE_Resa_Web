# URL Complète du site web !

--> https://resaweb.murphy.butmmi.o2switch.site/index.php

# Description complète de la procédure à faire pour réinstaller le site et la base de données sur un serveur local MAMP + l’url locale à utiliser pour y accéder : 

--> http://localhost:8888/sae-resa-web/index.php

    --> Pour réinstaller mon site web et ma base de données sur un serveur local utilisant MAMP, je commence par lancer l'application MAMP sur mon ordinateur. Une fois MAMP ouvert, je clique sur "Start Servers" pour démarrer les serveurs Apache et MySQL.
    Ensuite, j'accède aux préférences de MAMP en cliquant sur "Preferences". Dans l'onglet "Ports", je vérifie que les ports sont configurés correctement. Dans l'onglet "Apache", je peux définir le dossier racine pour mes sites. Une fois cette configuration effectuée, je copie les fichiers de mon site web dans ce dossier racine.
    Pour créer une nouvelle base de données, j'ouvre mon navigateur web et accède à http://localhost:8888/phpMyAdmin. Je clique ensuite sur l'onglet "Bases de données", entre un nom pour ma nouvelle base de données, puis clique sur "Créer".
    Enfin, pour importer la base de données, je sélectionne la base de données que je viens de créer dans phpMyAdmin. Je clique sur l'onglet "Importer", puis sur "Parcourir" pour sélectionner le fichier de sauvegarde de ma base de données. Je clique sur "Exécuter" pour importer les données.

# Lien du sheet des régles Opquast et a11y :

--> https://docs.google.com/spreadsheets/d/1dej-3xQ579fRecr0qsONjzo1FjMDyuhm1Khu2ta4stU/edit?usp=sharing

# Code relatif au Javascript
--> 1.A : 
    Local : http://localhost:8888/sae-resa-web/formulaire.php?id=2
    o2switch : https://resaweb.murphy.butmmi.o2switch.site/formulaire.php?id=6
    Fichier : script.js

--> 1.B : 
    Fichier : script.js
    Explication : Je n'ai pas eu besoin d'utilisé d'expression grâce au Regexp en Javascript, j'ai préféré utilisé les notions que nous connaissions avec la propriété split(). J'ai aussi manipuler la chaine de caractère pour ces bouts de code :

    - prixTotalDiv.textContent = `Prix total : ${price} €`;
    - prixTotalDiv.textContent = `Prix total : ${totalPrice} €`;
    - prixTotalDiv.textContent = "Erreur : Vous ne pouvez pas réserver le même bateau pour les deux options.";

--> 2.A : 
    Explication : Réalisé en PHP

--> 2.B : 
    Explication : Réalisé en PHP
