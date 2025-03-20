# Travail pratique 4
<<<<<<< HEAD
## Utilisation d'Ansible et Docker compose
### Installation d'un environnement de tests 

=======
## Orchestration de Conteneurs avec Ansible et Docker Compose
>>>>>>> origin/tp4

### Informations

- Évaluation : 10 % de la session
- Type de travail : individuel
- Date de remise : voir sur Léa
- Durée : 6 heures en classe
- Système d’exploitation : Linux / Docker
- Environnement : virtuel / Docker

<<<<<<< HEAD
### Objectifs

- Appliquer des procédures d’installation des services Internet conformément aux procédures et spécifications techniques.
- Configurer des services Internet selon la documentation ou le plan de conception (ex. : architecture réseau, technologique, etc.).
- Tester adéquatement le fonctionnement des services Internet.
- Activer des services Internet selon les procédures recommandées.
- Appliquer des correctifs et des mises à jour sur les systèmes d’exploitation serveur.

### Prérequis 
- Une machine de gestion avec Ansible installé.
- Une VM distante
- Accès SSH sans mot de passe à la VM distante depuis la machine de gestion.

### Description
 Dans cet exercice, nous allons mettre en place un environnement de tests à l'aide d'Ansible. Pour rappel, c'est l’environnement de simulation. Généralement, l’environnement
de simulation est identique à celui de production, si bien que le matériel
et les logiciels ne présentent pas de grandes différences lors de l’utilisation de l’application.

Ici nous aurons les composants suivants :  
- Un serveur utilisé pour rouler les conteneurs suivants : 
    - Nginx 1.21 : serveur Web  
    - PHP 8.1: langage de programmation.
    - MySQL 8.0 : serveur de bases de données  
- L'ensemble sera déployer depuis votre station de gestion vers votre serveur sur lequel vous installerez avec Ansible les pré-requis :
    - Docker et Docker compose
    - Python

- Les conteneurs doivent utiliser des noms de domaine internes (par exemple, php.backend et mysql.backend).


=======
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

### Description du projet

Vous allez déployer une application web simple comprenant les composants suivants :

   - Nginx 1.21 : Serveur web pour gérer les requêtes HTTP.
   - PHP 8.1 (FPM) : Interprète PHP pour exécuter le code de l'application.
   - MySQL 8.0 : Serveur de base de données pour stocker les données de l'application.


L'ensemble de ces composants sera déployé en tant que conteneurs Docker sur votre VM distante, orchestrés par Docker Compose. Ansible sera utilisé pour automatiser l'installation de Docker, Docker Compose et les dépendances nécessaires sur la VM.


### Étapes détaillées

 1- Configuration de l'environnement Ansible :
  - Créer un inventaire Ansible pour définir votre VM distante.
  - Vérifier la connectivité SSH sans mot de passe.
 
 2- Création du playbook Ansible :
   - Installer les dépendances Python nécessaires pour le module Docker d'Ansible.
   - Installer Docker et Docker Compose sur la VM distante.
   - Démarrer et activer le service Docker.
   - Création d'un réseau docker tp4 pour les conteneurs.
 
 3- Déploiement de l'application avec Docker Compose :
   -  Créer un fichier docker-compose.yml définissant les services Nginx, PHP-FPM et MySQL.
   -  Configurer les variables d'environnement pour les conteneurs (par exemple, les informations de connexion à la base de données).
   -  Utiliser des volumes Docker pour persister les données de la base de données et les fichiers de l'application.
   -  Configurer des noms de domaine interne au réseau docker pour les conteneurs.
     
 4-  Configuration des services web :
   -  Créer un fichier de configuration Nginx pour diriger les requêtes vers le conteneur PHP-FPM.
   -  Développer une page index.php simple pour tester la connexion à la base de données.
   -  Placer le fichier index.php dans le dossier html qui sera monté en volume dans les conteneurs de nginx et php.
      
 5- Exécution du playbook Ansible :
   - Exécuter le playbook Ansible pour déployer l'application sur la VM distante.
   - Vérifier que les conteneurs sont en cours d'exécution et que l'application est accessible via un navigateur web.
     
 6- Tests et validation :
  - Vérifier que la page index.php affiche les informations de connexion à la base de données.
  - Tester la connectivité entre les conteneurs.
  - Vérifier les journaux des conteneurs pour identifier les éventuelles erreurs.
>>>>>>> origin/tp4


### Description de l'infrastructure

Vous allez utiliser une structure comme celle-ci :

[Schema du TP4](../images/Tp4-2.png)


<<<<<<< HEAD
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
    - Vous devez donner vos sites de références.
=======

## Points importants

 - Utiliser des variables Ansible pour rendre votre code plus modulaire et réutilisable.
 - Utiliser ansible-vault pour l'encryption des informations sensibles.
 -   Documenter votre code avec des commentaires clairs et concis.
 -   Tester votre code régulièrement pour identifier et corriger les erreurs.
 -   Utiliser le système de contrôle de version (Git) pour gérer votre code.


## Remise

1-Sur LÉa : 
    - Un fichier text avec l'URL du dépôt GitHub et l'dresse IP de la VM distante.

2- Dépôt GitHub privé :
    - Code source complet du projet (playbook Ansible, fichier docker-compose.yml, fichiers de configuration Nginx et PHP).
    - Fichier README.md décrivant le projet, les instructions d'installation et d'utilisation.

3- Documentation :
  -  Lister les sites de références utilisées.
>>>>>>> origin/tp4



## Évaluation :


| Item                  | Points | Résultat |
| --------------------- | -----: | :-------: |
| Configuration correcte des réseaux Docker|    30 |           |
| Utilisation appropriée des variables Ansible |    20 |  
| Page Web d'identification fonctionnelle et informative|20 |
|Fichiers de configuration clair et bien documenté |    30 |          |
<<<<<<< HEAD
|
=======
>>>>>>> origin/tp4
| **Total**             | **100** |           |

## Références :

<<<<<<< HEAD
[Documentation de Community.Docker](https://docs.ansible.com/ansible/latest/collections/community/docker/index.html#description)

=======

- [Documentation officielle d'Ansible](docs.ansible.com)
- [Documentation de Ansible Community.Docker](https://docs.ansible.com/ansible/latest/collections/community/docker/index.html#description)
- [Documentation officielle de Docker](docs.docker.com)
- Documentation de Docker compose.
Toute autre référence utile pour le développement du projet.
>>>>>>> origin/tp4
