<?php
// Démarrer une session pour accéder aux données de session
session_start();

// Vérifier si l'utilisateur est connecté, sinon le rediriger vers la page de connexion
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

// Récupérer le nom et l'email de l'utilisateur depuis la session
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

// Gérer la déconnexion de l'utilisateur
if (isset($_GET['logout'])) {
    session_destroy(); // Détruire la session actuelle
    header('location: login.php'); // Rediriger vers la page de connexion
    exit;
}

// Traiter la demande de changement de mot de passe
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    // Récupérer le nouveau mot de passe et sa confirmation depuis le formulaire
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifier si les deux mots de passe correspondent
    if ($new_password !== $confirm_password) {
        $password_error = "Les mots de passe ne correspondent pas.";
    } else {
        // Inclure le fichier de connexion à la base de données
        include('server/connection.php');

        // Hacher le nouveau mot de passe
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Récupérer l'ID de l'utilisateur depuis la session
        $user_id = $_SESSION['user_id'];

        // Préparer et exécuter la requête SQL pour mettre à jour le mot de passe
        $sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hashed_password, $user_id);

        if ($stmt->execute()) {
            $password_success = "Mot de passe mis à jour avec succès.";
        } else {
            $password_error = "Erreur lors de la mise à jour du mot de passe.";
        }

        // Fermer la requête et la connexion à la base de données
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    

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


        <!--Account-->
        <section class="my-5 py-5">
            <div class="row container mx-auto">
                <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                    <h3 class="font-weight-bold">Account info</h3>
                    <hr class="mx-auto">
                    <div class="account-info">
                        <p>Name : <span><?php echo $user_name; ?></span></p>
                        <p>Email : <span><?php echo $user_email; ?></span></p>
                        <p><a href="" id="orders-btn">Your orders</a></p>
                        <p><a href="account.php?logout=1" id="logout-btn" class="btn">Logout</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">

                     <form id="change-password-form" method="POST">
                        
                <h3>Change Password</h3>
                <hr class="mx-auto">
                    <?php if (isset($password_error)): ?>
                        <p style="color: red;"><?php echo $password_error; ?></p>
                    <?php endif; ?>
                    <?php if (isset($password_success)): ?>
                        <p style="color: green;"><?php echo $password_success; ?></p>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="new_password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Changer le mot de passe" id="change-pass-btn" name="change_password">
                    </div>
                </form>
                </div>
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


</div>
<hr><p class="text-center" style="font-size: small;">Roots @ 2023 All Right Reserved</p>

</div>

<!--js part of bootstrap link-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>