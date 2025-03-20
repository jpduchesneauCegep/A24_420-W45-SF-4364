<!DOCTYPE html>
<html>
<head>
    <title>TP4 : Votre nom</title>
</head>
<body>
    <h1>Informations du serveur</h1>

    <?php
        // Informations PHP
        echo "<p><strong>Version de PHP :</strong> " . phpversion() . "</p>";
        echo "<p><strong>Nom du système d'exploitation :</strong> " . php_uname('s') . "</p>";
        echo "<p><strong>Version du noyau :</strong> " . php_uname('r') . "</p>";

        // Informations sur le conteneur (si disponible)
        $hostname = gethostname();
        if ($hostname) {
            echo "<p><strong>Nom d'hôte du conteneur :</strong> " . $hostname . "</p>";
        } else {
            echo "<p><strong>Nom d'hôte du conteneur :</strong> Non disponible</p>";
        }

        // Informations MySQL (tentative de connexion)
        $servername = "mysql.backend"; // Utilisez le nom de service Docker
        $username = "utilisateur";
        $password = "motdepasse";
        $dbname = "basededonnees";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<p><strong>Connexion MySQL :</strong> Échec - " . $conn->connect_error . "</p>";
        } else {
            echo "<p><strong>Connexion MySQL :</strong> Réussie</p>";
            // Vous pouvez ajouter ici des requêtes SQL pour afficher des données
            $conn->close();
        }
    ?>
</body>
</html>