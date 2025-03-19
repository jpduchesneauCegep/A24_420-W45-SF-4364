# Travail pratique 4
## Orchestration de Conteneurs avec Ansible et Docker Compose

### Informations

- Évaluation : 10 % de la session
- Type de travail : individuel
- Date de remise : voir sur Léa
- Durée : 6 heures en classe
- Système d’exploitation : Linux / Docker
- Environnement : virtuel / Docker

### Mise en contexte

L'automatisation du déploiement et de la configuration des infrastructures est une compétence cruciale en administration système. Dans ce travail pratique, vous allez mettre en œuvre un environnement de test complet en utilisant Ansible pour automatiser l'installation de Docker et Docker Compose, puis déployer une application web à trois niveaux avec Docker Compose.

### Objectifs

- Maîtriser l'utilisation d'Ansible pour l'automatisation de tâches d'administration système.
- Configurer et déployer des applications multi-conteneurs avec Docker Compose.
- Comprendre les principes de base de l'orchestration de conteneurs.
- Appliquer les meilleures pratiques en matière de configuration de services web (Nginx, PHP, MySQL).
- Développer des compétences en résolution de problèmes et en débogage.

### Prérequis 
- Une machine de gestion avec Ansible installé.
- Une VM distante dans l'infrastructure virtuelle vSphere du Cégep.
- Accès SSH sans mot de passe à la VM distante depuis la machine de gestion.

Description du projet

Vous allez déployer une application web simple comprenant les composants suivants :

   - Nginx 1.21 : Serveur web pour gérer les requêtes HTTP.
   - PHP 8.1 (FPM) : Interprète PHP pour exécuter le code de l'application.
   - MySQL 8.0 : Serveur de base de données pour stocker les données de l'application.

L'ensemble de ces composants sera déployé en tant que conteneurs Docker sur votre VM distante, orchestrés par Docker Compose. Ansible sera utilisé pour automatiser l'installation de Docker, Docker Compose et les dépendances nécessaires sur la VM.
    - Python

- Les conteneurs doivent utiliser des noms de domaine internes (par exemple, php.backend et mysql.backend).




### Description de l'infrastructure

Vous allez utiliser une structure comme celle-ci :

[Schema du TP4](../images/Tp4-2.png)


## Découper les tâches en étapes plus petites 

1. Configuration de l'inventaire Ansible

2. Création du playbook Ansible
    - Avec les dépendance Python pour Docker
    - Installer le module Python docker
    - Démarrer et activer le service Docker
    - Créer un réseau Docker TP4
    - Déployer le conteneur MySQL
    - Déployer le conteneur PHP-FPM
    - Déployer le conteneur Nginx
3. Configuration des fichiers Nginx et PHP (index.php est fournie sur le dépôt)
4. Exécutez le playbook depuis votre machine de gestion

## Explications

- Le playbook installe les dépendances nécessaires (Docker, Python).
- Il crée un réseau Docker pour permettre la communication entre les conteneurs.
- Il déploie les conteneurs MySQL, PHP-FPM et Nginx avec les configurations appropriées.
- Le fichier index.php dans le dossier html, permet de vérifier le bon fonctionnement de php et nginx.

## Points importants

- Assurez-vous que les ports 3306 (MySQL) et 80 (Nginx) sont ouverts sur votre VM distante.
 - Le dossier html est monté en volume dans le conteneur php-fpm et nginx. Cela signifie que les modifications apportées aux fichiers dans ce dossier seront reflétées dans les conteneurs.
 -  Le fichier nginx.conf est monté en volume dans le conteneur nginx. Cela signifie que les modifications apportées à ce fichier seront reflétées dans le conteneur.

Cet exercice vous donne une base solide pour automatiser le déploiement de conteneurs avec Ansible. 

## Remise

Vous devez fournir (déposé sur Léa) :

- L'adresse de votre dépôt GitHub dans un fichier texte.

Vous devez fournir (déposé sur GitHub) :

- Un dépôt privé avec votre code source du TP4.
    - Un fichier `README.md` qui résume les informations sur le dépôt.
        - Nom du projet
        - Date
        - Description du projet
    - Tous les fichiers de votre travail.
    - Vous devez m'ajouter à votre dépôt.
    - Vous devez utiliser le format Markdown (`.md`).
    - Indiquer l'adresse de votre serveur distant de l'infrastructure vSphere (10.100.2.X), je dois pouvoir vérifier la présence de la page index.php.
    - Vous devez donner vos sites de références.



## Évaluation :


| Item                  | Points | Résultat |
| --------------------- | -----: | :-------: |
| Configuration correcte des réseaux Docker|    30 |           |
| Utilisation appropriée des variables Ansible |    20 |  
| Page Web d'identification fonctionnelle et informative|20 |
|Fichiers de configuration clair et bien documenté |    30 |          |
|
| **Total**             | **100** |           |

## Références :

[Documentation de Community.Docker](https://docs.ansible.com/ansible/latest/collections/community/docker/index.html#description)

