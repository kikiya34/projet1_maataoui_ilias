<?php

// Inclure le fichier de connexion à la base de données.
require 'connection.php'; 

// Définition d'un tableau contenant les produits à insérer dans la base de données.
// Chaque produit est un tableau associatif contenant des clés telles que 'name', 'description', 'image', etc.
$products = [
    [
        'name' => 'Bag',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',
                    // Chemins des images du produit
        'image' => './assets/imgs/shopImgs/bag.jpg',
        'image2' => './assets/imgs/shopImgs/bag.jpg',
        'image3' => './assets/imgs/shopImgs/bag.jpg',
        'image4' => './assets/imgs/shopImgs/bag.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Box',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',
        'image' => './assets/imgs/shopImgs/box.jpg',
        'image2' => './assets/imgs/shopImgs/box.jpg',
        'image3' => './assets/imgs/shopImgs/box.jpg',
        'image4' => './assets/imgs/shopImgs/box.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Brief Case',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',

        'image' => './assets/imgs/shopImgs/briefcase.jpg',
        'image2' => './assets/imgs/shopImgs/briefcase.jpg',
        'image3' => './assets/imgs/shopImgs/briefcase.jpg',
        'image4' => './assets/imgs/shopImgs/briefcase.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Bucket',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',

        'image' => './assets/imgs/shopImgs/bucket.jpg',
        'image2' => './assets/imgs/shopImgs/bucket.jpg',
        'image3' => './assets/imgs/shopImgs/bucket.jpg',
        'image4' => './assets/imgs/shopImgs/bucket.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Coin Purse',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',

        'image' => './assets/imgs/shopImgs/coinPurse.jpg',
        'image2' => './assets/imgs/shopImgs/coinPurse.jpg',
        'image3' => './assets/imgs/shopImgs/coinPurse.jpg',
        'image4' => './assets/imgs/shopImgs/coinPurse.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Duffel',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',
        'image' => './assets/imgs/shopImgs/duffel.jpg',
        'image2' => './assets/imgs/shopImgs/duffel.jpg',
        'image3' => './assets/imgs/shopImgs/duffel.jpg',
        'image4' => './assets/imgs/shopImgs/duffel.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Frame',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',

        'image' => './assets/imgs/shopImgs/frame.jpg',
        'image2' => './assets/imgs/shopImgs/frame.jpg',
        'image3' => './assets/imgs/shopImgs/frame.jpg',
        'image4' => './assets/imgs/shopImgs/frame.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Speedy',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',
        'image' => './assets/imgs/shopImgs/speedy.jpg',
        'image2' => './assets/imgs/shopImgs/speedy.jpg',
        'image3' => './assets/imgs/shopImgs/speedy.jpg',
        'image4' => './assets/imgs/shopImgs/speedy.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    [
        'name' => 'Pack',
        'description'=>'Un sac est un récipient souple conçu pour contenir ou préserver quelque chose. Cependant, de nos jours au XXIᵉ siècle',
        'image' => './assets/imgs/shopImgs/pack.jpg',
        'image2' => './assets/imgs/shopImgs/pack.jpg',
        'image3' => './assets/imgs/shopImgs/pack.jpg',
        'image4' => './assets/imgs/shopImgs/pack.jpg',
        'price' => 800.00,
        // Ajoutez d'autres attributs si nécessaire
    ],
    // Répétez pour chaque produit...
    
];

// Parcourir chaque produit dans le tableau $products.
foreach ($products as $product) {

            // Échappement des caractères spéciaux pour sécuriser la requête.
    $name = mysqli_real_escape_string($conn, $product['name']);
    $description = mysqli_real_escape_string($conn, $product['description']);
    $image = mysqli_real_escape_string($conn, $product['image']);
    $image2 = mysqli_real_escape_string($conn, $product['image2']);
    $image3= mysqli_real_escape_string($conn, $product['image3']);
    $image4 = mysqli_real_escape_string($conn, $product['image4']);
    $price = mysqli_real_escape_string($conn, $product['price']);

    // Construction et exécution de la requête d'insertion pour chaque produit.
    $query = "INSERT INTO products (product_name, product_description, product_image, product_image2, product_image3, product_image4, product_price) VALUES ('{$name}','{$description}', '{$image}','{$image2}','{$image3}','{$image4}', '{$price}')";

    // Vérification de la réussite de la requête.
    if (!mysqli_query($conn, $query)) {
        die('Erreur d\'insertion: ' . mysqli_error($conn));
    }
}

// Message de confirmation.
echo "Les produits ont été insérés avec succès.";

// Fermeture de la connexion à la base de données.
mysqli_close($conn);

?>
