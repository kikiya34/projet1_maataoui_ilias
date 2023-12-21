<?php 
session_start();

// Ajouter un produit au panier
if(isset($_POST['add_to_cart'])){

    // Si le panier existe déjà dans la session
    if(isset($_SESSION['cart'])){

        // Récupérer les ID des produits déjà dans le panier
        $products_array_ids = array_column($_SESSION['cart'], "product_id");
        
        // Vérifier si le produit est déjà dans le panier
        if(!in_array($_POST['product_id'], $products_array_ids)){

            // Création d'un tableau avec les informations du produit à ajouter
            $product_array = array(
                'product_id' => $_POST['product_id'],
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );

            // Ajout du produit au panier
            $_SESSION['cart'][$_POST['product_id']] = $product_array;

        } else {
            // Si le produit est déjà dans le panier
            echo '<script>alert("Product was already added to cart");</script>';
        }

    } else {

        // Si c'est le premier produit ajouté au panier
        $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_image' => $_POST['product_image'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_quantity' => $_POST['product_quantity']
        );

        // Créer un nouveau panier et ajouter le produit
        $_SESSION['cart'][$_POST['product_id']] = $product_array;
    }

    // Calculer le total du panier
    calculateTotalCart();
}

// Supprimer un produit du panier
elseif(isset($_POST['remove_product'])){
    // Suppression du produit du panier
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    // Recalculer le total du panier
    calculateTotalCart();
}

// Modifier la quantité d'un produit dans le panier
elseif(isset($_POST['edit_quantity'])){
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    // Mise à jour de la quantité du produit
    $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;

    // Recalculer le total du panier
    calculateTotalCart();
}

// Fonction pour calculer le total du panier
function calculateTotalCart(){
    $total = 0;

    foreach($_SESSION['cart'] as $product){
        $total += $product['product_price'] * $product['product_quantity'];
    }

    $_SESSION['total'] = $total;
}

// Vider le panier
if(isset($_POST['empty_cart'])) {
    $_SESSION['cart'] = array();
    $_SESSION['total'] = 0;
    echo "<p>Votre panier a été vidé.</p>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    

    <!--bootstrap link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <!--css link-->
    <link rel="stylesheet" href="assets/css/style.css"/>

</head>
<body>

     <!--Navbar-->
     <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <div class="container">
          <img id="logo" src="assets/imgs/logo.jpeg"/>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
                <li class="nav-item">
                     <a class="nav-link active" aria-current="page" href="index.php">Home</a>
               </li>

                <li class="nav-item">
                    <a class="nav-link active" href="shop.php">Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Blog</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="contact.php">Contact Us</a>
                </li>   
                
                <li class="nav-item">
                   <a href="cart.php"><i class="fas fa-shopping-bag"></i></a> 
                   <a href="account.php"> <i class="fas fa-user"></i></a> 
                </li>
              

            </ul>
            
          </div>
        </div>
      </nav>


  <!--Cart-->
    <section class="cart container my-5 py-5">
        <div class="container mt-3">
            <h1 class="font-wight-bolde">Your Cart</h1>
            <form method="POST" action="" class="text-end">
                          <input class="btn" type="submit" name="empty_cart" value="Vider le panier" />
                        </form>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>

            <?php
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    // Calcul et affichage des détails du produit
                ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="<?php echo htmlspecialchars($value['product_image']); ?>" />
                                <div>
                                    <p><?php echo htmlspecialchars($value['product_name']); ?></p>
                                    <small><span>$</span><?php echo htmlspecialchars($value['product_price']); ?></small>
                                    <br>
                                    <form method="POST" action="cart.php">
                                        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>" />
                                        <input type="submit" name="remove_product" class="remove-btn" value="remove" />
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            <form method="POST" action="cart.php">
                                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($value['product_id']); ?>" />
                                <input type="number" name="product_quantity" value="<?php echo htmlspecialchars($value['product_quantity']); ?>" />
                                <input type="submit" name="edit_quantity" class="edit-btn" value="edit" />
                            </form>
                        </td>
                        <td>
                            <span>$</span>
                            <span class="Product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                        </td>
                    </tr>
                <?php
                } // Fin de la boucle foreach
                ?>
                  <?php
            } else {
                echo "<h1 class='text-center'>Your cart is empty.</h1>";
            }
            ?>
        </table>

        <div class="cart-total">
            <table>
                <tr>
                    <td>Total</td>
                    <td>$<?php echo isset($_SESSION['total']) ? $_SESSION['total'] : '0'; ?></td>
                </tr>
            </table>
        </div>
          
        
        <div class="checkout-container">
              <form method="POST" action="checkout.php">    
                   <input type="submit" name="checkout" class="btn checkout-bnt" value="checkout"/>
              </form>
        </div>
                       



    </section>    







   <!--Footer-->
 <div class="footer-container">
  <div class="footer-links">
    
    <div>
        <ul class="footer-list">
            <li>Delivery</li>
            <li>Return Procedure</li>
            <li>Cookie Policy</li>
        </ul>
    </div>
    
    <div>
        <ul class="footer-list">
            <li>Our Story</li>
            <li>History of Leather</li>              
        </ul>
    </div>

    <div>
        <ul class="footer-list">
            <li>Press</li>
            <li>FAQ</li>
            <li>Contact Us</li>
        </ul>
    </div>

</div>

<div style="background-color:#5a0e2b5e;color:white;width: 97vw;" class="text-center mt-5">
<span>Subscribe to receive product updates and our newsletters.</span>
</div>
<div class="social-accounts">

<i class="fab fa-pinterest-p"></i>
<i class="fab fa-tiktok"></i>
<i class="fab fa-facebook-f"></i>
<i class="fab fa-instagram"></i>
<i class="fab fa-youtube"></i>


</div><hr>
<p class="text-center" style="font-size: small;">Roots @ 2023 All Right Reserved</p>
</div>

    <!--js part of bootstrap link-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>