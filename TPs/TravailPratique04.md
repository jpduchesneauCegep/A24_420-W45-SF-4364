# Travail pratique 4
## Utilisation d'Ansible et Docker compose
### Installation d'un environnement de tests 


### Informations

- Évaluation : 10 % de la session
- Type de travail : individuel
- Date de remise : voir sur Léa
- Durée : 6 heures en classe
- Système d’exploitation : Linux / Docker
- Environnement : virtuel / Docker

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

