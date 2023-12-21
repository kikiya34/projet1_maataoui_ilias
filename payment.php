<?php 
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement</title>
    

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


        <!--Payement-->
        <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                    <h1 class="form-weight-bold">Payment</h1><hr class='mx-auto'>
                    
            </div>
            <div class="mx-auto container text-center">
                <h1><?php echo $_GET['order_status'];?></h1>
                <h3>Total payment: $<?php echo $_SESSION['total'];?></h3>
                
               <button type="submit">Pay Now</button>


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

   
   
         

 <!--js part of bootstrap link-->  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>