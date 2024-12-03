# Exercice 7 - Docker : Prise en main des conteneurs docker

### Informations
- Évaluation : formative.
- Type de travail : individuel.
- Durée : 1 heures.
- Système d'exploitation : Linux client, Linux serveur ou Windows.

### Objectifs

- Effectuer des tâches de gestion du système d’exploitation.
- Création correcte des comptes et des groupes d’utilisateurs.
- Attribution correcte des droits d’accès.
- Gestion appropriée des processus, de la mémoire et de l’espace disque.
- Localiser l'emplacement et la taille du noyau (kernel) Linux.
- Localiser les modules associés au noyau de Linux.
- Vérifier les modules chargés en mémoire.
- Localiser les fichiers sources de Linux.
- Utiliser des commandes d'administration système.


## Section 1 : Installation d'Apache

a.	Pour débuter, on doit trouver une image qui nous intéresse. Aller sur le site Web hub.docker.com (docker hub est un dépôt pour mettre nos images, il est aussi possible de récupérer des images faites par d’autres personnes). Si ce n’est pas déjà fait, inscrivez-vous. Une fois connecté, faites une recherche pour httpd (apache). Vous pouvez voir qu’il y a plus de 10 000 images. Trouvez l’image officielle, elle se nome httpd et est fait par "The Apache HTTP Server Project". Nous allons nous servir de cette image. Cliquez httpd et vous allez avoir toute l’information pour vous servir de l’image.

b.	Avant de lancer notre serveur, on va se créer un répertoire pour nos fichiers HTML et l'ensemble de nos fichier de développement. À partir de votre répertoire personnel (dossier) $HOME, créer un répertoire Dev et à l’intérieur un répertoire Sites. Vous devriez avoir la structure suivante :

```bash
 $home/Dev/Sites
 # Exemple sur ma machine :
 /home/jpduches/Dev/Sites
```
Tous vos exercices à venir ce feront à partir de cette adresse. 

- Placez vous dans le répertoire Sites et faite les commandes suivante pour créer votre serveur : 

```bash
 cd ~/Site
 docker run -dit --name my-apache-app -p 8080:80 -v $(pwd):/usr/local/apache2/htdocs/ httpd:2.4 
```

<details>
    <summary>Pour un rappelle, voici l'explication de la commande précédente</summary>

- run: commande de base pour exécuter un nouveau conteneur Docker.

- -dit : Démarrer le conteneur en arrière-plan : Le conteneur continuera de fonctionner même si vous fermez votre terminal.

	Préparer le conteneur pour une interaction future (si nécessaire) : Les options "-i" et "-t" sont présentes mais ne sont pas utilisées dans ce cas précis. Elles pourraient être utiles si vous aviez besoin d'interagir avec le conteneur de manière interactive plus tard.

- --name : Attribue un nom au conteneur pour faciliter son identification.

- -p : Mappe le port 80 du conteneur (celui utilisé par Apache) au port 8080 de votre machine hôte. Cela vous permet d'accéder au serveur web en utilisant http://localhost:8080 sur votre machine local.

- -v $(pwd):/usr/local/apache2/htdocs/: Monte le répertoire courant de votre machine hôte dans le répertoire /usr/local/apache2/htdocs/ du conteneur. Cela signifie que les fichiers que vous placez dans votre répertoire courant seront accessibles par le serveur web à l'intérieur du conteneur.

- httpd:2.4: Spécifie l'image Docker à utiliser. Dans ce cas, c'est une image contenant un serveur web Apache version 2.4.

</details>


### Vérification de l'installation d'Apache

- Vérifiez que votre image s’exécute bien.
```bash
docker container ls
```
- Et par la suite, vérifier les ports qui écoute sur votre poste local :

```bash
ss -tnap | grep 8080
```
- Ouvrez votre navigateur et allez au site Web http://localhost:8080.


Vous avez une page Web ? 
<details>
En principe non. Vous voyez votre répertoire parce que vous n'avez pas de fichier index.html dans votre site Web.
</details>
- Dans le répertoire Sites ajouter une page Web index.html avec le contenu ci-dessous (vous pouvez l’améliorer à votre goût) et rafraîchir la page de votre navigateur.

```html
<html>
  <title>Apache test</title>
  <body>
    <p>Wow! Une page Web!</p>
  </body>
</html>
```
Avez-vous votre page Web?
<details>
Oui, sinon trouvez le problème.
</details>










![docker container ls](../images/container_list.png)


```

**Remarque :** vous devez entrer juste assez de caractères de l’ID pour le rendre unique.  





## Pour vérification
Remettre une capture démontrant vos 3 conteneurs s'exécutant.
![Exemple de réponse.](../images/reponse06.png)  

## Références
[https://docs.docker.com/](https://docs.docker.com/)
