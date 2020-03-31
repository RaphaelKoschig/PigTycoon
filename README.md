# PigTycoon
Ce site est une simulation de gestion de cochons.

## Installation
Clonez ou dézippez l'archive dans votre répertoire www de wamp ou laragon pour accéder en local au projet.
Aucune installation de dépendance n'est nécessaire pour le faire fonctionner.
Vous devez charger la base avant d'aller sur le site.
Pour ceci vous devez vous connecter en premier lieu à votre gestionnaire de base en local (phpmyadmin,...), créer une base de données "pigtycoon", puis importer le script .sql présent dans le dossier /sql du projet. Ensuite vous pourrez vous connecter sur localhost/pigtycoon et profitez des cochons :) .

NDLR : quand je parle de cochons "actifs" pour la suite, je désigne par là des cochons qui ne sont pas marqués comme "supprimés" (state 1 pour actif, state 0 pour supprimé).

# FrontOffice

Les boutons du menus apparaissent actifs selon la page consultées.

## Accueil
Un slider qui présente les 3 derniers cochons enregistrés dans la base.
Un moteur de recherche pour accéder à la page de cards des cochons en les triant par sexe ou par poids. Cette recherche fonctionne par requêtes SQL.
Un autre moteur de recherche qui va proposer les noms en auto-complete en ajax. Il est non fonctionnel pour le moment.
Deux cochons actifs choisis aléatoirement dans la base. Ce sont toujours deux cochons différents.

## Cochons
Liste de cochons données par page de 6 cochons sous forme de cards. La pagination est dynamique et peut s'adapter au nombres de cochons présents dans la liste, selon la requête de tri dans la page d'accueil. Elle est créée uniquement en php, sans javascript.

## Cochon
En cliquant sur détail on accède aux informations d'un cochon. Sa durée de vie est définie par une date de mort choisie aléatoirement. On peut accéder à ses parents s'il en a.

## Société
Rien de particulier

## Contact
Formulaire de contact standard.

# BackOffice (Gestion)

Un tableau présentant tous les cochons. Il est géré en javascript et permet de différentes sortes de tri. Nombre d'éléments, tri par ordre alphabétique, poids ou date de naissance, etc. Pour n'avoir que les femelles ou les mâles, il suffit d'écrire "mâle" ou "femelle" dans la barre Rechercher.

## Actions
Dans la colonne Actions on peut choisir de mettre à jour un cochon, de le supprimer (state 0) de la base, de le tuer (date de mort actualisé), ou d'accéder à son arbre généaolique.

## Générer
On peut choisir de générer jusqu'à 100 cochons aléatoirement (ils seront générés sans parent car ce n'est pas une reproduction)

## Reproduire
On peut choisir un mâle et une femelle qui donneront naissance de 1 à 8 nouveaux cochons (avec parents cette fois-ci)

# Code
Arborescence :
ajax > script ajax
controllers > 2 controllers front et back pour rediriger sur les bonnes pages selon la requête
models > classes d'accès à la base de données
public > css, js et images
services > divers scripts d'actions sur la base, indépendants des templates
sql > fichier de création de bdd
views > backoffice pour les vues gestion, frontoffice pour les vues front utilisateurs, components pour divers composants qui méritaient d'être extraits des vues
index.php > fonctionne en tant que routeur

# Infos supplémentaires
Pas de connexion utilisateur/admin mais facilement implémentable plus tard avec une table user, des rôles et des variables de sessions.
Il y avait possibilité d'ajouter le fichier .htaccess pour plus de sécurité et pour de belles url.
Ces options n'ont pas été implémentées par manque de temps et car elles n'étaient pas demandées dans le sujet.