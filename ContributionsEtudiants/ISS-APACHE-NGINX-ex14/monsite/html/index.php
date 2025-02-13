<h1>Je te test!</h1>
<h4>Tentative de connexion MariaDB depuis PHP..</h4>
<?php
	$host = "mariadb";
	$user = $_ENV["DB_USER"];
	$pass = $_ENV["DB_PASSWD"];
	$conn = new mysqli($host, $user, $pass);

	if ($conn->connect_error) {
		die("La connexion a echoue: ". $conn->connect_error);
	}
	echo "Connexion reussie a MariaDB!";
?>
