# ContactManagerCLI

Petit logiciel en ligne de commande fait en php afin d'alimenter une liste de contacts avec les informations suivantes:

- name
- email
- phone_number

<img src="https://static.antoinelrk.com/openclassrooms/4abb73a3-75da-4d69-bb27-b736bb38246e.jpg">

## Setup

Ce projet n'incluant pas composer, le système ``.env`` a été remplacé par un fichier ``includes/Constants.php``; Pensez à le modifier pour faire correspondre à votre environnement.
La configuration par défaut est prévue pour fonctionner directement avec Docker. 

Il y deux manière de démarrer le projet; une "normale" en installant les outils nécessaire sur votre machine. Et une autre qui consiste a utiliser Docker (Conseillée).
Vous avez un fichier ``docker-compose.yml`` et ``Dockerfile`` pré-remplis.

### Démarrer avec Docker

Après avoir lancé docker docker, vous pouvez démarrer la stack avec ``docker-compose``:

````shell
docker-compose up -d --build
````

Pour intéragir avec le container:

````shell
docker exec -ti contact_manager_cli /bin/sh
````
Si besoin, vous pouvez visualiser les données via phpmyadmin à cette adresse: ``http://localhost:8081``.
Les credentials sont:

- Serveur: ``contact_manager_cli_database`` (C'est le nom du container dans le ``docker-compose.yml``)
- Utilisateur: ``root``
- Mot de passe: ``local``

### Démarrage normal

Prérequis:

- Un serveur de base de données SQL disponible, avec une base de donnée nommée: ``contact_manager_cli``.
   Le fichier ``contacts.sql`` contient un dump de la base sans données.
- Php 8.3

Ajouter vos informations de connexion SQL dans le fichier ``includes/Constants.php`` 

Lancer le projet avec ``php index.php``

# Améliorations prévues

1. Mettre en place une validation de paramètres.

    Actuellement, les paramètres pour la création/modification des données ne sont pas vérifiée...

```php
$validator = Validator::make($attributes, [
    'name' => 'required|string',
    'email' => 'required|email',
    'phone_number' => 'phone_number|required'
]);
```

2. Ajouter la commande ``update``
