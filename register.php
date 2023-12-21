<?php 

// Démarrage ou reprise d'une session PHP
session_start();

// Inclusion du fichier de connexion à la base de données
include('server/connection.php');

// Redirige vers la page du compte si l'utilisateur est déjà connecté
if(isset($_SESSION['logged_in'])){    
    header('Location: account.php');
    exit;
}

// Traitement du formulaire d'inscription
if(isset($_POST['register'])){

    // Récupération et nettoyage des saisies utilisateur
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Vérification de la concordance des mots de passe
    if($password !== $confirmPassword){
        header('Location: register.php?error=passwords_dont_match');
    }
    // Vérification de la longueur du mot de passe
    else if(strlen($password) < 6){
        header('Location: register.php?error=password_short');
    }
    else {
        // Vérification de l'existence de l'email dans la base de données
        $stmt1 = $conn->prepare("SELECT count(*) FROM users WHERE user_email = ?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        // Si l'email existe déjà, renvoyer une erreur
        if($num_rows != 0){
            header('Location: register.php?error=email_exists');
        } else {
            // Hachage du mot de passe pour le stockage sécurisé
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insertion du nouvel utilisateur dans la base de données
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $stmt->bind_param('sss', $name, $email, $hashed_password);

            // Exécution de l'insertion et vérification du succès
            if($stmt->execute()){
                // Définition des variables de session pour l'utilisateur
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;

                // Redirection vers la page de compte avec un message de succès
                header('Location: account.php?register=success');
            } else {
                // Redirection vers la page d'inscription avec un message d'erreur
                header('Location: register.php?error=account_creation_failed');
            }
        }  
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    

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


            <!--Register Form-->
        <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
                <h1 class="form-weight-bold">Register</h1>
                
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">
                <p style='color: red;'><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group">
                    <label >Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required/>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
                </div>
                <div class="form-group">
                    <a href='login.php' id="login-url" >Do you have an account? Login</a>  
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