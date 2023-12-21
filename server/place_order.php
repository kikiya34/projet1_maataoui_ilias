<?php

// Démarrer une nouvelle session ou reprendre une session existante
session_start();

// Inclure le fichier de connexion à la base de données
include('connection.php');

// Vérifier si le formulaire de commande a été soumis
if(isset($_POST['place_order'])){

    // Récupérer les informations de l'utilisateur à partir du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    // Récupérer le coût total de la commande à partir de la session
    $order_cost = $_SESSION['total'];

    // Définir le statut initial de la commande et l'identifiant de l'utilisateur (à modifier selon la logique de votre application)
    $order_status = "on_hold";
    $user_id = 1; // Ici, l'ID utilisateur est défini statiquement à 1
    $order_date = Date('Y-m-d H:i:s');

    // Préparer une requête SQL pour insérer la commande dans la base de données
    $stmt = $conn->prepare("INSERT INTO orders(order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) VALUES(?,?,?,?,?,?,?); ");
    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $user_phone, $city, $address, $order_date);
    $stmt->execute();

    // Obtenir l'ID de la commande insérée
    $order_id = $stmt->insert_id;

    // Parcourir les produits dans le panier et les insérer dans la table des articles de commande
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];
        $product_id = $product['product_id'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];

        // Insérer chaque produit comme un article de commande dans la base de données
        $stmt1 = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date) VALUES (?,?,?,?,?,?,?,?)");
        $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);
        $stmt1->execute();
    }

    // Optionnel : Vider le panier après la commande
    // unset($_SESSION['cart']);

    // Rediriger l'utilisateur vers la page de paiement avec un message de statut
    header('location: ../payment.php?order_status=order placed successfully');
}
?>
