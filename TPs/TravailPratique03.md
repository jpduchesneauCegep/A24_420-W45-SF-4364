# Travail pratique 3
## Mise en place d’un service Web (Docker Compose)

### Informations

- Évaluation : 10 % de la session
- Type de travail : individuel
- Date de remise : voir sur Léa
- Durée : 9 heures en classe
- Système d’exploitation : Linux / Docker
- Environnement : virtuel / Docker

### Objectifs

- Appliquer des procédures d’installation des services Internet conformément aux procédures et spécifications techniques.
- Configurer des services Internet selon la documentation ou le plan de conception (ex. : architecture réseau, technologique, etc.).
- Tester adéquatement le fonctionnement des services Internet.
- Activer des services Internet selon les procédures recommandées.
- Appliquer des correctifs et des mises à jour sur les systèmes d’exploitation serveur.

### Description

La première section sera un travail pratique où vous aurez les tâches suivantes à accomplir :

- Faire une installation complète d’un site Web avec équilibrage de charge.
- Utiliser Nginx comme équilibreur/répartiteur de charge (load balancer).
- Utiliser Apache (httpd) comme serveur de contenus.
- Utiliser php-fpm comme FastCGI.
- Utiliser MySQL comme serveur de base de données.

### Description de l'infrastructure

Vous allez utiliser Nginx comme équilibreur de charge pour avoir une structure comme celle-ci :

![Infra](images/EFCS.jpg)

Donc, on se connecte sur `www.tp3.com` qui appelle le proxy Nginx qui, lui, appelle en alternance les serveurs 1 et 2. Chacun des serveurs est relié à un serveur PHP et à un serveur MySQL.

- Les services seront des conteneurs.
- Les deux serveurs Web doivent être identiques, à part une information, dans la page Web, qui permet de distinguer le serveur 1 et le serveur 2 : par exemple, le nom d'hôte et/ou l'adresse IP.
- Les serveurs httpd seront reliés à un réseau avant pour la communication extérieure.
- Les serveurs httpd auront chacun leur réseau arrière pour communiquer avec leurs serveurs PHP et MySQL.
- Le fichier de configuration `httpd.conf` doit être monté par un point de montage au fichier `httpd.conf` du conteneur.
- Le contenu des serveurs httpd doit être monté par un point de montage à un répertoire de la VM.
- Le serveur MySQL doit avoir un volume de données persistant dans la VM.
- Vous devrez démontrer le système fonctionnel.

**Attention :** ne mettez pas de dépendance aux serveurs httpd.

## Remise

Vous devez fournir (déposé sur Léa) :

- L'adresse de votre dépôt GitHub dans un fichier texte.

Vous devez fournir (déposé sur GitHub) :

- Un dépôt privé avec votre code source du TP3.
    - Un fichier `README.md` qui résume les informations sur le dépôt.
        - Nom du projet
        - Date
        - Description du projet
    - Tous les fichiers de votre travail à l'exception de la vidéo.
    - Je dois trouver l'adresse (en hyperlien) de votre vidéo dans le fichier `README.md` de votre projet.
    - Vous devez m'ajouter à votre dépôt.
    - Vous devez utiliser le format Markdown (`.md`).
    - Vous devez donner vos sites de références.

Votre vidéo :

- Une vidéo d'environ 8 min (maximum 10 min) :
    - Démonstration que le site fonctionne avec les deux serveurs (expliquer ce qui se passe).
    - Explication de tous vos fichiers de configuration et les journaux (logs) les plus pertinents.

## Évaluation :


| Item                  | Points | Résultat |
| --------------------- | -----: | :-------: |
| LoadBalancer          |        |           |
| Définition des 2 serveurs |    10 |           |
| Contexte serveur      |    10 |           |
| Serveur1/Serveur2     |        |           |
| httpd                 |    10 |           |
| php                   |    10 |           |
| Lien entre php et MySQL |    20 |           |
| Page Web d'identification |    10 |           |
| Compréhension (Vidéo) |    30 |           |
| **Total**             | **100** |           |

## Références :

[Documentation de Community.Docker](https://docs.ansible.com/ansible/latest/collections/community/docker/index.html#description)

[Documentation pour l'utilisation de la fonction `php_uname`](https://www.php.net/manual/en/function.php-uname.php)