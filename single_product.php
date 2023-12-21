<?php 
// Inclusion du fichier de connexion à la base de données
include('server/connection.php');

// Vérification de la présence de l'ID du produit dans l'URL
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];               

    // Préparation et exécution de la requête pour récupérer les détails du produit
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id=?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result();
} else {
    // Redirection vers la page d'accueil si aucun ID de produit n'est fourni
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    

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


  <!--Single product-->
<section class="container single-product my-5 pt-5">
    <div class='row mt-5'>
        

        <?php while($row = $product->fetch_assoc()){ ?>
           
            <div class="col-lg-5 col-md-6 col-sm-12">
            <img class="img-fluid w-100 pb-1" id="mainImg" src="<?php echo $row['product_image'];?>"/>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img  class="small-img" src="<?php echo $row['product_image2'];?>" width="100%"/>
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $row['product_image3'];?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="<?php echo $row['product_image4'];?>" width="100%" class="small-img"/>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-12 col-sm-12">
            
            <h3 class="py-4"><?php echo $row['product_name'];?></h3>
            <h2>$<?php echo $row['product_price'];?></h2>

            <form method="POST" action="cart.php">
                <input type="hidden" name='product_id' value="<?php echo htmlspecialchars($row['product_id']); ?>">   
                <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($row['product_image']); ?>"/>
                <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($row['product_name']); ?>"/>
                <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($row['product_price']); ?>"/>
                <input type="number" name="product_quantity" value="1"/>
                <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>


            <h4 class="mt-5 mb-5">Product details</h4>
            <p  class="p-1" ><?php echo $row['product_description'];?>.</p>
        </div>

        <?php } ?>

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
    

<!--js page logique-->
<script>

    var mainImg = document.getElementById("mainImg");
    var smallImg = document.getElementsByClassName("small-img");

    for(let i=0; i<4; i++){
        smallImg[i].onclick = function(){
            mainImg.src = smallImg[i].src;
    }
}
</script>

</body>
</html>