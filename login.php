<?php
// Démarrer une nouvelle session
session_start();

// Inclure le fichier de connexion à la base de données
include('server/connection.php');

// Vérifier si l'utilisateur est déjà connecté et le rediriger vers la page de compte si c'est le cas
if(isset($_SESSION['logged_in'])){
    header('Location: account.php');
    exit;
}

// Traitement du formulaire de connexion
if(isset($_POST['login_btn'])){
    // Récupérer les données saisies par l'utilisateur
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Préparer la requête SQL pour éviter les injections SQL
    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ?");
    $stmt->bind_param('s', $email);

    // Exécuter la requête
    if ($stmt->execute()) {
        $stmt->store_result();

        // Vérifier si l'utilisateur existe (1 ligne retournée)
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
            $stmt->fetch();

            // Vérifier le mot de passe
            if (password_verify($password, $user_password)) {
                // Créer des variables de session et rediriger vers la page de compte
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['logged_in'] = true;

                header('Location: account.php?message=logged in succesfully');
                exit;
            } else {
                // Redirection en cas de mot de passe incorrect
                header('Location: login.php?error=Incorrect password');
                exit;
            }
        } else {
            // Redirection si l'utilisateur n'existe pas
            header('Location: login.php?error=User not found');
            exit;
        }
    } else {
        // Redirection en cas d'erreur d'exécution de la requête
        header('Location: login.php?error=Login failed');
        exit;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    

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


                <!--Login Form-->
            <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                    <h2 class="form-weight-bold">Login</h2>
                    
            </div>
            <div class="mx-auto container">
                <form id="login-form" action="login.php" method="POST">
                <p style='color: red;' class='text-center'><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
                </div>
                <div class="form-group">
                    <a id="register-url" href="register.php" >Don't have account? Register</a>  
                </div>
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