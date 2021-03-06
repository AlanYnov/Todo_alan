# Fonctionnalités réalisées

## En tant qu'utilisateur non connecté, je peux : 
    - accéder à la page d'accueil
    - me connecter si je suis enregistré
    - m'enrigistrer si je ne le suis pas déjà

## En tant qu'utilisateur connecté, je peux : 
    - modifier mon profil
    - me désinscrire
    - créer un board  et j'en serais alors propriétaire
    - aller sur les boards dont je suis participant
  
## En tant que propriétaire d'un board, je peux : 
    - transférer la propriété du board
    - inviter des utilisateurs, ils seront participants du board
    - faire à minima toutes les actions que peuvent faire les utilisateurs de mon board : consulter Détails
    - faire à minima toutes les actions que peuvent faire les participants des tâches de mon board : consulter Détails
    - supprimer le board
    - supprimer un commentaire des tâches de mon board
    - Faire toutes les actions d'un participant du board ou d'un utilisateur assigné à une tâche
  
## En tant que participant d'un board (invité par son propriétaire), je peux
    - Créer une tâche 
    - Éditer tous les champs d'une tâches
    - Commenter une tâche
  
## En tant qu'assigné à une tâche, je peux : 
    - Changer son status
    
## En tant que propriétaire d'un commentaire : 
    - Éditer le commentaire
    - Supprimer le commentaire

# Points de blocage rencontrés
    - Utilisation des routes

# Solutions mise en oeuvre
Consulter le travail déjà fait en classe ainsi que la documentation de Laravel

# Fonctionnalités non réalisées
    - Transfert de proriété
    - CRUD pièces jointes (pas demandé)

# Règles concernant les entités : 

## Board :
    - Listing des boards => utilisateur connecté
    - Détails d'un board =>  participant du board
    - Éditer un board => propriétaire du board
    - Supprimer un board => propriétaire du board
    - Créer un board => utilisateur connecté

### Détails :
    - Changer propriété => propriétaire du board
    - Ajouter/Supprimer participant => propriétaire du board

## Task :
    - Listing des tâches => participant du board
    - Détails d'une tâche =>  participant du board
    - Éditer une tâche => participant à la tâche
    - Supprimer une tâche => propriétaire du board
    - Créer une tâche => participant du board

### Détails :
    - Ajouter/Supprimer participant => propriétaire du board

## Commentaire :
    - Listing des commentaires => participant du board
    - Détails d'un commentaire =>  participant du board
    - Éditer un commentaire => participant à la tâche
    - Supprimer un commentaire => propriétaire du board
    - Créer un commentaire => participant du board

# Framework PHP

Le framework étudié est Laravel, de la version 6 à 8. 

## Les objectifs de ce cours

- comprendre l'architecture du framework et les concepts
  - Structurer son code
  - Maîtriser l'accès aux données et leur persistance depuis un ORM 
  -  La notion de ressource et de routage
  - L'utilisation des contrôleurs
- Sécuriser son code  et gérer les autorisations applicatives
- Améliorer les temps de développement grâce aux outils du framework


## Les supports

Les supports seront réalisés pendant les cours et mis à  disposition sur moodle dès la fin du cours. 



## Les modalités d'évaluation

### Le code

Le code produit sera déposé de manière régulière sur git. 

Les critères d'évaluation du code seront les suivants : 

- code commenté
- passage de tests unitaires et d'intégration. 

Ces tests seront fournis au préalable et vous aiderons pendant les phases de développement. 

 ### Les concepts

En plus du code, vous fournirez pour chaque étapes clés un document expliquant les concepts mis en œuvre. Ce document devra entièrement être rédigé par vos soins. il sera passé à l'outil de détection de plagiat compilatio et le taux de similitude ne devra pas être supérieur à 15%, sous peine d'être rejeté et non évalué. 

## L'organisation du travail

Toute l'avancée sera réalisée sous forme de projet : à la fin des cours, vous aurez une application fonctionnelle développée tout au long du déroulement du module. 



### Sujet 

L'objectif sera de réaliser une application Web de gestion de tâche collaboratif. Pour utiliser cette application, l'utilisateur devra être enregistré et connecté. Une fois connecté, il pourra consulter/créer/modifier/supprimer des tâches, et y ajouter d'autres utilisateurs, enregistrés eux aussi. 

Une tâche possède un titre, une description, une date de fin (*due_date*),  un propriétaire (lui seul peut la supprimer), une priorité, un état, une catégorie et peut posséder plusieurs documents en pièces jointe. 

Une tâche peut être assignée à un de ces participants. 

Chaque utilisateur peut rajouter des commentaires sur les tâches. Son nom et l'heure et la date du commentaire doivent être gardé, et il est possible d'éditer le commentaire (cela sera marqué sur le commentaire qu'il a été édité) et même de le supprimer.

## Pour vous aider : 
- faire les fichiers de migrations : 

  - https://laravel.com/docs/8.x/migrations
  - Lire la doc pour concernant les bases de données : 

- faire les modèles Eloquents : https://laravel.com/docs/8.x/eloquent

  	- Lire la suite de la doc : il faut rajouter les relations : https://laravel.com/docs/8.x/eloquent-relationships

  Vous pouvez essayer de générer des données au moyen de seeders  et/ou de factories : https://laravel.com/docs/8.x/seeding

Un blog très pertinent  : http://laravel.sillo.org/ 

## Le mcd de l'application

[mcd]: https://raw.githubusercontent.com/NF-yac/todo-b2-20-21/master/database/mcd/todo.svg "MCD de l'application"
