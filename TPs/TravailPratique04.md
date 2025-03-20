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
  (VM_DFC-A24_4364_420W45_ISS_JPD-TP4)
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
   
 
 3- Déploiement de l'application avec Docker Compose :
   -  Créer un fichier docker-compose.yml définissant les services Nginx, PHP-FPM et MySQL.
   -  Configurer les variables d'environnement pour les conteneurs (par exemple, les informations de connexion à la base de données).
   -  Utiliser des volumes Docker pour persister les données de la base de données et les fichiers de l'application.
   -  Configurer des noms de domaine interne tp4 au réseau docker pour les conteneurs.
     
 4-  Configuration des services web :
   -  Créer un fichier de configuration Nginx pour diriger les requêtes vers le conteneur PHP-FPM.
   -  Utiliser la page [index.php](index.php) pour tester la connexion à la base de données.
   -  Placer le fichier index.php dans le dossier html qui sera monté en volume dans les conteneurs de nginx et php.
      
 5- Exécution du playbook Ansible :
   - Exécuter le playbook Ansible pour déployer l'application sur la VM distante.
   - Vérifier que les conteneurs sont en cours d'exécution et que l'application est accessible via un navigateur web.
     
 6- Tests et validation :
  - Vérifier que la page [index.php](index.php) affiche les informations de connexion à la base de données.
  - Tester la connectivité entre les conteneurs.
  - Vérifier les journaux des conteneurs pour identifier les éventuelles erreurs.


### Description de l'infrastructure

Vous allez utiliser une structure comme celle-ci :

[Schema du TP4](../images/tp4-2.png)



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



## Évaluation :


| Item                  | Points | Résultat |
| --------------------- | -----: | :-------: |
| Configuration correcte des réseaux Docker|    10 |           |
| Utilisation appropriée des variables Ansible et Docker compose|    20 |  
| Page Web d'identification fonctionnelle |20 |
|Fichiers de configuration clair et bien documenté |    50 |          |
| **Total**             | **100** |           |

## Références :


- [Documentation officielle d'Ansible](docs.ansible.com)
- [Documentation de Ansible Community.Docker](https://docs.ansible.com/ansible/latest/collections/community/docker/index.html#description)
- [Documentation officielle de Docker](docs.docker.com)
- Documentation de Docker compose.
Toute autre référence utile pour le développement du projet.
