<?php 

// Établissement de la connexion à la base de données MySQL.
// Les paramètres incluent le nom d'hôte, le nom d'utilisateur, le mot de passe, et le nom de la base de données.

// Nom d'hôte de la base de données (souvent localhost)
$host = "localhost";

// Nom d'utilisateur pour accéder à la base de données (ici, 'root')
$username = "root";

// Mot de passe pour accéder à la base de données (pas de mot de passe par défaut)
$password = "";

// Nom de la base de données à laquelle se connecter (ici, 'ecommerce')
$dbname = "ecommerce";

// Tentative de connexion à la base de données.
// Utilisation de la fonction mysqli_connect pour établir la connexion.
$conn = mysqli_connect($host, $username, $password, $dbname);

// Vérification de la connexion.
// Si la connexion échoue, afficher un message d'erreur et arrêter l'exécution du script.
if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}

?>
