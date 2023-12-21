<?php

// Inclusion du fichier de connexion à la base de données.
// Ce fichier établit la connexion avec la base de données MySQL et définit l'objet $conn.
include ('connection.php');

// Préparation de la requête SQL pour sélectionner tous les produits de la base de données.
$stmt = $conn->prepare("SELECT * FROM products");

// Exécution de la requête préparée.
$stmt->execute();

// Récupération des résultats de la requête.
// Les résultats sont stockés dans la variable $shop_products.
$shop_products = $stmt->get_result();

?>
